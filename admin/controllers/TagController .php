<?php

function tagListAll()
{
    $title = 'Danh Sách tag';
    $view = 'tags/list_tag';
    $dataTag = getAllTag();


    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}

function tagShowOne($id)
{
    $tag = showOneTag('products', $id);
    if (empty($tag)) {
        e404();
    }



    $title = 'Chi Tiết tag' . $tag['name'];
    $view = 'tags/detail_tag';
    $detail_tag = getTag();


    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}



function tagCreate()
{
    $title = 'Tạo tag';
    $view = 'tags/create';
    $dataTag = getAllTag();
    $detail_tag = getTag();

    if (!empty($_POST)) {
        $avatar = null; // Khởi tạo biến $avatar để sử dụng trong phần xử lý tải lên ảnh

        if (isset($_FILES['avatar']) && $_FILES['avatar']['error'] == UPLOAD_ERR_OK) {
            $dir = "../img/";
            $up_name = time() . ".jpg";
            $upfile = $dir . $up_name;


            if (move_uploaded_file($_FILES['avatar']['tmp_name'], $upfile)) {
                $avatar = $upfile;
            } else {
                echo 'Failed to move uploaded file.';
                exit();
            }
        }







        $datas = [
            "name" => $_POST['name'] ?? NULL,
            "price" => $_POST['price'] ?? NULL,
            "description" => $_POST['description'] ?? NULL,
            "quantity" => $_POST['quantity'] ?? NULL,
            "category_id" => $_POST['category'] ?? NULL,
            "avatar" => $avatar,

        ];


        $errors = validateCreateTag($datas);
        if (!empty($errors)) {
            $_SESSION['errors'] = $errors;
            $_SESSION['datas'] = $datas;
            header('location: ' . BASE_URL_ADM . '?act=tag_create');
            exit();
        }

        insert('products', $datas);


        $_SESSION['suscess'] = "Thao Tác THành Công !";

        header('location: ' . BASE_URL_ADM . '?act=tags');
        exit();
    }

    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}

function validateCreateTag($datas)
{
    $errors = [];
    if (empty($datas['name'])) {
        $errors[] = "Không Để trống Name";
    } else if (strlen($datas['name']) > 50) {
        $errors[] = "Trường Name Độ Dài TỐi Đã 50 Kí tự !";
    } else if (!checkUniqueName('products', $datas['name'])) {
        $errors[] = "name đã được sử dụng !";
    }

    return $errors;
}


function tagUpdate($id)
{
    // Lấy thông tin người dùng theo id
    $tagr = showOneTag('products', $id);

    // Kiểm tra nếu người dùng không tồn tại
    if (empty($tagr)) {
        e404();
    }

    // Lưu đường dẫn ảnh cũ
    $old_avatar = $tagr['avatar'];

    $title = 'Update tag';
    $view = 'tags/update';
    $dataTag = getAllTag();
    $update_tag = getTag();

    // Kiểm tra nếu có dữ liệu POST được gửi lên
    if (!empty($_POST)) {
        if (isset($_FILES['avatar']) && $_FILES['avatar']['error'] == UPLOAD_ERR_OK) {

            $dir = "../img/";
            $up_name = time() . ".jpg";
            $upfile = $dir . $up_name;
            if (move_uploaded_file($_FILES['avatar']['tmp_name'], $upfile)) {
                // Lưu đường dẫn ảnh mới
                $avatar = $upfile;
            } else {
                // Nếu không thể di chuyển tệp, sử dụng ảnh cũ
                $avatar = $old_avatar;
            }
        } else {

            // Nếu không có file avatar mới được tải lên, sử dụng ảnh cũ
            $avatar = $old_avatar;
        }
        // Tạo mảng dữ liệu để cập nhật
        $datas = [
            "name" => $_POST['name'] ?? NULL,
            "price" => $_POST['price'] ?? NULL,
            "description" => $_POST['description'] ?? NULL,
            "quantity" => $_POST['quantity'] ?? NULL,
            "category_id" => $_POST['category'] ?? NULL,
            "avatar" => $avatar,

        ];

        $errors = validateUpdateTag($id, $datas);
        if (!empty($errors)) {
            $_SESSION['errors'] = $errors;
            $_SESSION['datas'] = $datas;
        } else {
            $_SESSION['suscess'] = "Thao Tác THành Công !";
            update_tag('products', $id, $datas);
        }

        // Gọi hàm update để cập nhật thông tin người dùng

        // Chuyển hướng sau khi cập nhật thành công
        header('location: ' . BASE_URL_ADM . '?act=tag_update&id=' . $id);
        exit();
    }

    // Gọi file giao diện
    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}

function validateUpdateTag($id, $datas)
{
    $errors = [];
    if (empty($datas['name'])) {
        $errors[] = "Không Để trống Name";
    } else if (strlen($datas['name']) > 50) {
        $errors[] = "Trường Name Độ Dài Tối Đa 50 Kí tự !";
    } else if (!checkUniqueNameCateUpdate('products', $id, $datas['name'])) {
        $errors[] = "Name đã được sử dụng !";
    }

    // Kiểm tra nếu không có lỗi mới trả về mảng rỗng
    if (empty($errors)) {
        return [];
    } else {

        return $errors;
    }
}




function tagDelete($id)
{

    delete3('products', $id);
    $_SESSION['suscess'] = "Thao Tác THành Công !";

    header('location: ' . BASE_URL_ADM . '?act=tags');
    exit();
    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}
