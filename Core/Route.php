<?php

namespace Core;


class Route
{
    protected static $routes = [];

    /**
     * Регистрация шаблона GET запроса
     * Example route: /Class@method
     * @ used as delimiter for controller and action
     *
     * @param string $route
     * @param string $controller
     * @param string $action
     */
    public static function get($route, $controller = null, $action = null)
    {
        list($route, $controller, $action) = self::selectControllerAndActionFromUrl($route, $controller, $action);

        self::add($route, [
            'method' => 'GET',
            'controller' => $controller,
            'action' => $action,
        ]);
    }

    /**
     * Регистрация шаблона POST запроса
     * Example route: /Class@method
     * @ used as delimiter for controller and action
     *
     * @param string $route
     * @param string $controller
     * @param string $action
     */
    public static function post($route, $controller = null, $action = null)
    {

        list($route, $controller, $action) = self::selectControllerAndActionFromUrl($route, $controller, $action);

        self::add($route, [
            'method' => 'POST',
            'controller' => $controller,
            'action' => $action,
        ]);
    }

    /**
     * Извлечение контроллера и метода из шаблона
     * @param $route
     * @param $controller
     * @param $action
     * @return array [route, controller, action]
     */
    protected static function selectControllerAndActionFromUrl($route, $controller, $action)
    {
        $posSeparatorAction = strrpos($route, '@');
        $posSeparatorController = strrpos($route, '/');

        if (empty($action))
            $action = substr($route, $posSeparatorAction + 1, strlen($route));
        if (empty($controller))
            $controller = substr($route, $posSeparatorController + 1, $posSeparatorAction - 1);

        $route = str_replace('@', '/', $route);

        return [$route, $controller, $action];
    }

    /**
     * Создание маски и регистрация
     * @param string $route
     * @param array $params
     */
    protected static function add($route, $params = [])
    {
        $route = preg_replace('/\//', '\\/', $route); // Экранируем "/"
        $route = preg_replace('/\{([a-z]+)\}/', '(?P<\1>[a-z-]+)', $route); // Замена параметра на регулярку
        $route = preg_replace('/\{([a-z]+):([^\}]+)\}/', '(?P<\1>\2)', $route); // Замена параметра с регуляркой
        $route = '/^' . $route . '$/i';

        self::$routes[] = array_merge(['mask' => $route], $params); // Добавление правила в список
    }


    /**
     * Удаление строки GET параметров
     * @param string $url
     *
     * @return string
     * */
    protected static function rmQueryStrVar($url)
    {
        return preg_replace('/\?.*/', '', $url);
    }

    /**
     * Сбор параметров роутера
     * @param string $url
     *
     * @return array [route, method, controller, action, matches]
     */
    protected static function match(string $url): array
    {
        foreach (self::$routes as $route) {
            // Проверка текущего URL на совпадение с маской и допустимым методом
            if ($route['method'] == $_SERVER['REQUEST_METHOD'] && preg_match($route['mask'], $url, $matches)) {
                return [
                    $route,
                    $route['method'],
                    $route['controller'],
                    $route['action'],
                    $matches,
                ];
            }
        }
        return [false, false, false, false, false, false];
    }

    /**
     * Обработка текущего URL
     *
     * @param mixed $url
     * @return void
     */
    public static function dispatch($url)
    {
        $objRequest = new \Core\Request(); // Создание объекта запроса
        $url = self::rmQueryStrVar($url); // Чистый URL

        // Сбор параметров
        list($route, $method, $controller, $action, $matches) = self::match($url);

        // Проверка наличия роутера
        if ($route) {
            $controller = "App\\Controllers\\" . $controller; // Строка подгрузки класса

            // Проверка работоспособности
            if (class_exists($controller)) {
                $objController = new $controller(); // Создание объекта контроллера
                $objController->$action($objRequest, $matches);

            } else {
                if ($objRequest->method === 'GET') die("Извините данная страница отсутвует");
                else  echo Response::json(['message' => 'Not found this action', 'status' => false], 404);
            }
        } else {

            if ($objRequest->method === 'GET') die('Извините данная страница отсутвует');
            else  echo Response::json(['message' => 'Not found this action', 'status' => false], 404);
        }
    }

}