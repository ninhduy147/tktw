<?php
require_once '../commons/env.php';
require_once '../commons/help.php';
require_once '../commons/connect.php';
require_once '../commons/model.php';
// require_once '../commons/crud-db.php';

require_file(PATH_CONTROLLER_ADMIN);
require_file(PATH_MODEL_ADMIN);
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




// $result = match ($act) {
//     '/' => dashboard(),
//     'users' => userListAll(),
//     'user_detail' => userShowOne($_GET['id'] ?? null), // Đảm bảo 'id' được truyền hoặc là null
//     'user_create' => userCreate(),
//     'user_update' => userUpdate($_GET['id'] ?? null), // Đảm bảo 'id' được truyền hoặc là null
//     '' => userDelete($_GET['id'] ?? null), // Đảm bảo 'id' được truyền hoặc là null
//     default => throw new UnhandledMatchError("Unhandled match case '{$act}'"),
// };

match (true) {
    $act === '/' => dashboard(),
    $act === 'users' => userListAll(),
    $act === 'user_detail' => userShowOne($_GET['id'] ?? null),
    $act === 'user_create' => userCreate(),
    $act === 'user_update' => userUpdate($_GET['id'] ?? null),
    $act === 'user_delete' => userUpdate($_GET['id'] ?? null),
    strpos($act, 'detail_user') !== false => (function () {
        // Kiểm tra nếu có tham số 'id' được truyền vào qua URL
        if (isset($_GET['id'])) {
            detail_user($_GET['id']);
        } else {
            // Xử lý khi không có tham số 'id' được truyền vào
        }
    })(),
};


// match (true) {
//     $act === '/' => dashboard(),
//     $act === 'list_user' => list_user(),
//     strpos($act, 'detail_user') !== false => (function () {
//         // Kiểm tra nếu có tham số 'id' được truyền vào qua URL
//         if (isset($_GET['id'])) {
//             detail_user($_GET['id']);
//         } else {
//             // Xử lý khi không có tham số 'id' được truyền vào
//         }
//     })(),
// };




require_once '../commons/disconect.php';
