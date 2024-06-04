<?php

session_start();


require_once '../commons/env.php';
require_once '../commons/help.php';
require_once '../commons/connect.php';
require_once '../commons/model.php';
// require_once '../commons/crud-db.php';
require_once '../commons/model.php';

require_file(PATH_CONTROLLER_ADMIN);
require_file(PATH_MODEL_ADMIN);

$act = $_GET['act'] ?? '/';
middleware_auth_check($act);
$result = match (true) {
    $act === '/' => dashboard(),

    //Login & LogOut
    $act === 'login' => authenShowFormLogin(),

    $act === 'logout' => authenLogout(),

    //CRUD USER
    $act === 'users' => userListAll(),
    $act === 'user_detail' => userShowOne($_GET['id'] ?? null),
    $act === 'user_create' => userCreate(),
    $act === 'user_update' => userUpdate($_GET['id']),
    $act === 'user_delete' => userDelete($_GET['id'] ?? null),

    //CRUD CATEGORY
    $act === 'categorys' => categoryListAll(),
    $act === 'category_detail' => categoryShowOne($_GET['id'] ?? null),
    $act === 'category_create' => categoryCreate(),
    $act === 'category_update' => categoryUpdate($_GET['id']),
    $act === 'category_delete' => categoryDelete($_GET['id'] ?? null),




    strpos($act, 'detail_user') !== false => (function () {
        if (isset($_GET['id'])) {
            detail_user($_GET['id']);
        } else {
            // Xử lý khi không có tham số 'id' được truyền vào
        }
    })(),
    default => null
};

if ($result === null) {
    // Xử lý cho trường hợp không match bất kỳ điều kiện nào
}

$result = match (true) {
    $act === '/' => dashboard(),
    //CRUD tag
    $act === 'tags' => tagListAll(),
    $act === 'detail_tag' => tagShowOne($_GET['id'] ?? null),
    $act === 'tag_create' => tagCreate(),
    $act === 'tag_update' => tagUpdate($_GET['id']),
    $act === 'tag_delete' => tagDelete($_GET['id'] ?? null),

    strpos($act, 'detail_tag') !== false => (function () {
        if (isset($_GET['id_product'])) {
            detail_tag($_GET['id_product']);
        } else {
            // Xử lý khi không có tham số 'id' được truyền vào
        }
    })(),
    default => null
};

$result = match (true) {
    $act === '/' => dashboard(),

    //CRUD COMMENT
    $act === 'comments' => commentListAll(),
    $act === 'comment_detail' => commentShowOne($_GET['id'] ?? null),
    $act === 'comment_create' => commentCreate(),
    $act === 'comment_update' => commentUpdate($_GET['id']),
    $act === 'comment_delete' => commentDelete($_GET['id'] ?? null),


    strpos($act, 'detail_comment') !== false => (function () {
        if (isset($_GET['id_comment'])) {
            detail_comment($_GET['id_comment']);
        } else {
            // Xử lý khi không có tham số 'id' được truyền vào
        }
    })(),
    default => null
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
