<?php


namespace Core;


class Response
{
    public static function json($body='', $status='Empty', $code=200) {
        http_response_code($code);
        header('Content-Type: application/json');

        $protocol = (isset($_SERVER['SERVER_PROTOCOL']) ? $_SERVER['SERVER_PROTOCOL']: 'HTTP/1.0');
        header($protocol . ' ' . $code . ' ' . $status);

        if (!empty($body)) {
            return json_encode($body);
        }
        return;
    }

    public static function view($template, $data=[], $layout=true) {

        $pathAssets = '/App/Views/layout/assets';

        if ($layout) include  "App/Views/layout/header.php";

        include "App/Views/${template}.php" ;

        if ($layout) include  "App/Views/layout/footer.php";
    }
}