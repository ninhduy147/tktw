<?php
require_once './commons/env.php';
require_once './commons/help.php';
require_once './commons/connect.php';
require_once './commons/model.php';

require_file(PATH_CONTROLLER);
require_file(PATH_MODEL);
// require_file(PATH_VIEW);
require_file(PATH_MODEL_ADMIN);

$act = $_GET['act'] ?? '/';

$result = match (true) {
    $act === '/' => homeIndex(),
    $act === 'list_user' => list_user(),
    strpos($act, 'detail_user') !== false => (function () {
        // Kiểm tra nếu có tham số 'id' được truyền vào qua URL
        if (isset($_GET['id'])) {
            detail_user($_GET['id']);
        } else {
            // Xử lý khi không có tham số 'id' được truyền vào
            echo "ID is required for detail_user action.";
        }
    })(),
    default => (function () {
        // Xử lý hành động mặc định khi không có case nào khớp
        echo "Invalid action.";
    })(),
};

require_once './commons/disconect.php';
