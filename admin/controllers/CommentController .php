<?php

function commentListAll()
{
    $title = 'Danh Sách comment';
    $view = 'comments/list_comment';
    $datacomment = getAllcomment();


    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}

function commentShowOne($id)
{
    $comment = showOnecomment('comments', $id);
    if (empty($comment)) {
        e404();
    }



    $title = 'Chi Tiết comment' . $comment['id'];
    $view = 'comments/detail_comment';
    $detail_comment = getcomment();


    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}



function commentCreate()
{
    $title = 'Tạo comment';
    $view = 'comments/create';
    $datacomment = getAllcomment();
    $detail_comment = getcomment();
    $data_comment_prd = getcommentProduct();
    $data_comment_user = getcommentUsers();

    if (!empty($_POST)) {








        $datas = [
            "id" => $_POST['id'] ?? NULL,
            "id_product" => $_POST['id_product'] ?? NULL,
            "content" => $_POST['content'] ?? NULL,


        ];


        $errors = validateCreatecomment($datas);
        if (!empty($errors)) {
            $_SESSION['errors'] = $errors;
            $_SESSION['datas'] = $datas;
            header('location: ' . BASE_URL_ADM . '?act=comment_create');
            exit();
        }

        insert('comments', $datas);


        $_SESSION['suscess'] = "Thao Tác THành Công !";

        header('location: ' . BASE_URL_ADM . '?act=comments');
        exit();
    }

    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}

function validateCreatecomment($datas)
{
    $errors = [];
    if (empty($datas['content'])) {
        $errors[] = "Không Để trống content";
    } else if (strlen($datas['content']) > 200) {
        $errors[] = "Trường content Độ Dài TỐi Đã 50 Kí tự !";
    } else if (!checkUniqueContent('comments', $datas['content'])) {
        $errors[] = "content đã được sử dụng !";
    }

    return $errors;
}


function commentUpdate($id)
{
    // Lấy thông tin người dùng theo id
    $commentr = showOnecomment('comments', $id);

    // Kiểm tra nếu người dùng không tồn tại
    if (empty($commentr)) {
        e404();
    }

    // Lưu đường dẫn ảnh cũ

    $title = 'Update comment';
    $view = 'comments/update';
    $datacomment = getAllcomment();
    $update_comment = getcomment();

    // Kiểm tra nếu có dữ liệu POST được gửi lên
    if (!empty($_POST)) {

        // Tạo mảng dữ liệu để cập nhật
        $datas = [
            "id" => $_POST['id'] ?? NULL,
            "id_product" => $_POST['id_product'] ?? NULL,
            "content" => $_POST['content'] ?? NULL,


        ];

        $errors = validateUpdatecomment($id, $datas);
        if (!empty($errors)) {
            $_SESSION['errors'] = $errors;
            $_SESSION['datas'] = $datas;
        } else {
            $_SESSION['suscess'] = "Thao Tác THành Công !";
            update_comment('comments', $id, $datas);
        }

        // Gọi hàm update để cập nhật thông tin người dùng

        // Chuyển hướng sau khi cập nhật thành công
        header('location: ' . BASE_URL_ADM . '?act=comment_update&id=' . $id);
        exit();
    }

    // Gọi file giao diện
    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}

function validateUpdatecomment($id, $datas)
{
    $errors = [];
    if (empty($datas['content'])) {
        $errors[] = "Không Để trống content";
    } else if (strlen($datas['content']) > 50) {
        $errors[] = "Trường content Độ Dài Tối Đa 50 Kí tự !";
    } else if (!checkUniqueNameCMTUpdate('comments', $id, $datas['content'])) {
        $errors[] = "content đã được sử dụng !";
    }

    // Kiểm tra nếu không có lỗi mới trả về mảng rỗng
    if (empty($errors)) {
        return [];
    } else {

        return $errors;
    }
}




function commentDelete($id)
{

    delete5('comments', $id);
    $_SESSION['suscess'] = "Thao Tác THành Công !";

    header('location: ' . BASE_URL_ADM . '?act=comments');
    exit();
    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}
