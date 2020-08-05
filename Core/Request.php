<?php

namespace Core;


class Request
{
    public $method;
    public $safeParams;
    public $params;
    public $headers;

    function __construct()
    {
        $this->method = $_SERVER['REQUEST_METHOD'];
        // Делаем безопасные параметры
        $this->safeParams = self::getSafeParams($_REQUEST);
        $this->params = $_REQUEST;
        // Извлекаем заголовки
        $this->headers = self::getRequestHeaders();
    }

    public function getParam($name)
    {
        return $this->safeParams[$name];
    }

    public function getSafeParams($params)
    {
        $safeAr = [];
        foreach ($params as $key => $value) {
            if (is_array($value)) $safeAr[$key] = self::getSafeParams($value);
            else $safeAr[$key] = htmlspecialchars($value);
        }

        // Добавляем файлы в параметры запроса
        foreach ($_FILES as $key => $value) {
            $safeAr[$key] = $value;
        }

        return $safeAr;
    }

    public static function getRequestHeaders()
    {
        $headers = array();
        foreach ($_SERVER as $key => $value) {
            if (substr($key, 0, 5) <> 'HTTP_') continue;
            $header = str_replace(' ', '-', ucwords(str_replace('_', ' ', strtolower(substr($key, 5)))));
            $headers[$header] = $value;
        }
        return $headers;
    }
}