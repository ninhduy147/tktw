<?php
if (!function_exists('require_file')) {
    function require_file($pathFolder)
    {
        $files = array_diff(scandir($pathFolder), ['.', '..']);
        foreach ($files as $fl) {
            require_once $pathFolder . '/' . $fl;
        }
    }
}

if (!function_exists('debug')) {
    function debug($data)
    {
        echo "<pre>";
        print_r($data);
        echo "</pre>";
    }
}


if (!function_exists('e404')) {
    function e404()
    {
        echo "404 - NOT FOUND";
        die;
    }
}

if (!function_exists('middleware_auth_check')) {
    function middleware_auth_check($act)
    {
        if ($act === 'login') {
            if (!empty($_SESSION['user'])) {
                header('location: ' . BASE_URL_ADM);
                exit();
            }
        } elseif (empty($_SESSION['user'])) {

            header('location: ' . BASE_URL_ADM . '?act=login');
            exit();
        }
    }
}
