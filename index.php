<?php
require_once './commons/env.php';
require_once './commons/help.php';
require_once './commons/connect.php';
require_once './commons/model.php';

require_file(PATH_CONTROLLER);
require_file(PATH_MODEL);
// require_file(PATH_VIEW);

// insert('users', [
//     'username' => 'NinhDUy147',
//     'password' => 'NinhDUy147',
//     'email' => 'NinhDUy147@gmail.com',
//     'phone_number' => '032645985',
//     'role' => 'Thanh Vien',
//     'avatar' => ''
// ]);
// die;

// update('users', 4, [
//     'username' => 'NinhDUy147',
//     'password' => 'NinhDUy147',
//     'email' => 'NinhDUy147@gmail.com',
//     'phone_number' => '032645985',
//     'role' => 'Thanh Vien',
//     'avatar' => '',
// ]);
// die;

// delete('users', 7);

// $users = showOne('users', 1);
// debug($users);


$act = $_GET['act'] ?? '/';

// match ($act) {
//     '/' => homeIndex(),
//     'list_user' =>  list_user(),
//     'detail_user' => detail_user($_GET['id']),
// };
match (true) {
    $act === '/' => homeIndex(),
    $act === 'list_user' => list_user(),
    strpos($act, 'detail_user') !== false => (function () {
        // Kiểm tra nếu có tham số 'id' được truyền vào qua URL
        if (isset($_GET['id'])) {
            detail_user($_GET['id']);
        } else {
            // Xử lý khi không có tham số 'id' được truyền vào
        }
    })(),
};




require_once './commons/disconect.php';
