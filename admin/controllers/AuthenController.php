<?php

function authenShowFormLogin()
{
    if (!empty($_POST)) {
        authenLogin();
    }

    require_once PATH_VIEW_ADMIN . 'authen/login.php';
}

function authenLogin()
{

    $user = getUserAdminByEmailAndPassword($_POST['email'], $_POST['password']);
    if (empty($user)) {
        $_SESSION['errors'] = 'Email hoặc Mật khẩu chưa đúng!';

        header('location: ' . BASE_URL_ADM . '?act=login');

        exit();
    }


    $_SESSION['user'] = $user;

    header('location:' . BASE_URL_ADM);
    exit();
}




function authenLogout()
{
    if (!empty($_SESSION['user'])) {
        session_destroy();
    }

    header('location:' . BASE_URL);
    exit();
}
function generateRandomToken($length = 40)
{
    return bin2hex(random_bytes($length / 2));
}
