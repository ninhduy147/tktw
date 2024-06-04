<?php

function categoryListAll()
{
    $title = 'Danh Sách category';
    $view = 'category/list_cate';
    $datacategory = getAllcategory();


    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}

function categoryShowOne($id)
{
    $category = showOne('categories', $id);
    if (empty($category)) {
        e404();
    }

    $title = 'Chi Tiết category' . $category['categoryname'];
    $view = 'categories/detail_category';
    $detail_role = getRole();


    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}

function categoryCreate()
{
    $title = 'Tạo category';
    $view = 'category/create';
    $datacategory = getAllcategory();
    $detail_role = getRole();

    if (!empty($_POST)) {
        $avatar = null; // Khởi tạo biến $avatar để sử dụng trong phần xử lý tải lên ảnh


        $datas = [
            "code" => $_POST['code'] ?? NULL,
            "name_category" => $_POST['name_category'] ?? NULL,
            "description" => $_POST['description'] ?? NULL,

        ];

        $errors = validateCreateCategory($datas);
        if (!empty($errors)) {
            $_SESSION['errors'] = $errors;
            $_SESSION['datas'] = $datas;
            header('location: ' . BASE_URL_ADM . '?act=category_create');
            exit();
        }

        insert('categories', $datas);

        $_SESSION['suscess'] = "Thao Tác THành Công !";

        header('location: ' . BASE_URL_ADM . '?act=categorys');
        exit();
    }

    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}

function validateCreateCategory($datas)
{
    $errors = [];
    if (empty($datas['name_category'])) {
        $errors[] = "Không Để trống Name";
    } else if (strlen($datas['name_category']) > 50) {
        $errors[] = "Trường Name Độ Dài TỐi Đã 50 Kí tự !";
    } else if (!checkUniqueNameCate('categories', $datas['name_category'])) {
        $errors[] = "name đã được sử dụng !";
    }

    return $errors;
}


function categoryUpdate($id)
{
    // Lấy thông tin người dùng theo id
    $categoryr = showOneCate('categories', $id);

    // Kiểm tra nếu người dùng không tồn tại
    if (empty($categoryr)) {
        e404();
    }

    // Lưu đường dẫn ảnh cũ


    $title = 'Update category';
    $view = 'category/update';
    $datacategory = getAllcategory();
    // $update_category = getRole();

    // Kiểm tra nếu có dữ liệu POST được gửi lên
    if (!empty($_POST)) {

        // Tạo mảng dữ liệu để cập nhật
        $datas = [
            "code" => $_POST['code'] ?? NULL,
            "name_category" => $_POST['name_category'] ?? NULL,
            "description" => $_POST['description'] ?? NULL,

        ];



        $errors = validateUpdateCategory($id, $datas);
        if (!empty($errors)) {
            $_SESSION['errors'] = $errors;
            $_SESSION['datas'] = $datas;
        } else {
            $_SESSION['suscess'] = "Thao Tác THành Công !";
            update_cate('categories', $id, $datas);
        }

        // Gọi hàm update để cập nhật thông tin người dùng

        // Chuyển hướng sau khi cập nhật thành công
        header('location: ' . BASE_URL_ADM . '?act=category_update&id=' . $id);
        exit();
    }

    // Gọi file giao diện
    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}


function validateUpdateCategory($id, $datas)
{
    $errors = [];
    if (empty($datas['name_category'])) {
        $errors[] = "Không Để trống Name";
    } else if (strlen($datas['name_category']) > 50) {
        $errors[] = "Trường Name Độ Dài Tối Đa 50 Kí tự !";
    } else if (!checkUniqueNameCateUpdate('categories', $id, $datas['name_category'])) {
        $errors[] = "Name đã được sử dụng !";
    }

    // Kiểm tra nếu không có lỗi mới trả về mảng rỗng
    if (empty($errors)) {
        return [];
    } else {

        return $errors;
    }
}




function categoryDelete($id)
{

    delete4('categories', $id);
    $_SESSION['suscess'] = "Thao Tác THành Công !";

    header('location: ' . BASE_URL_ADM . '?act=categorys');
    exit();
    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}
