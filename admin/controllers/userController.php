<?php

function userListAll()
{
    $title = 'Danh Sách User';
    $view = 'users/list_user';
    $dataUser = getAllUser();


    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}

function userShowOne($id)
{
    $user = showOne('users', $id);
    if (empty($user)) {
        e404();
    }

    $title = 'Chi Tiết User' . $user['username'];
    $view = 'users/detail_user';
    $detail_role = getRole();


    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}


function userCreate()
{
    $title = 'Tạo User';
    $view = 'users/create';
    $dataUser = getAllUser();
    $detail_role = getRole();

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
            "username" => $_POST['username'] ?? NULL,
            "password" => $_POST['password'] ?? NULL,
            "email" => $_POST['email'] ?? NULL,
            "phone_number" => $_POST['phone_number'] ?? NULL,
            "id_role" => $_POST['role'] ?? NULL,
            "avatar" => $avatar, // Gán giá trị của biến $avatar vào mảng $datas
        ];

        $errors = validateCreate($datas);
        if (!empty($errors)) {
            $_SESSION['errors'] = $errors;
            $_SESSION['datas'] = $datas;
            header('location: ' . BASE_URL_ADM . '?act=user_create');
            exit();
        }

        insert('users', $datas);

        $_SESSION['suscess'] = "Thao Tác THành Công !";

        header('location: ' . BASE_URL_ADM . '?act=users');
        exit();
    }

    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}

function validateCreate($datas)
{
    $errors = [];
    if (empty($datas['username'])) {
        $errors[] = "Không Để trống Name";
    } else if (strlen($datas['name']) > 50) {
        $errors[] = "Trường Name Độ Dài TỐi Đã 50 Kí tự !";
    }

    if (empty($datas['email'])) {
        $errors[] = "Không Để trống email";
    } else if (!filter_var($datas['email'], FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Trường email Không đúng định dạng !";
    } else if (!checkUniqueEMail('users', $datas['email'])) {
        $errors[] = "Email đã được sử dụng !";
    }

    if (empty($datas['password'])) {
        $errors[] = "Không Để trống password";
    } else if (strlen($datas['password']) < 8 || strlen($datas['password']) > 20) {
        $errors[] = "Trường password Độ Dài TỐi Đã 20 và nhỏ nhất 8 Kí tự !";
    }

    if (empty($datas['id_role'])) {
        $errors[] = "Không Để trống role";
    } else if (!in_array($datas['id_role'], [1, 2])) {
        $errors[] = "Trường role phải 1 or 2!";
    }

    return $errors;
}


function userUpdate($id)
{
    // Lấy thông tin người dùng theo id
    $userr = showOne('users', $id);

    // Kiểm tra nếu người dùng không tồn tại
    if (empty($userr)) {
        e404();
    }

    // Lưu đường dẫn ảnh cũ
    $old_avatar = $userr['avatar'];

    $title = 'Update User';
    $view = 'users/update';
    $dataUser = getAllUser();
    $update_role = getRole();

    // Kiểm tra nếu có dữ liệu POST được gửi lên
    if (!empty($_POST)) {

        // Kiểm tra nếu có file avatar mới được tải lên
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
            "username" => $_POST['username'],
            "password" => $_POST['password'],
            "email" => $_POST['email'],
            "phone_number" => $_POST['phone_number'],
            "id_role" => $_POST['role'],
            "avatar" => $avatar,
        ];

        $errors = validateUpdate($id, $datas);
        if (!empty($errors)) {
            $_SESSION['errors'] = $errors;
            $_SESSION['datas'] = $datas;
        } else {
            $_SESSION['suscess'] = "Thao Tác THành Công !";
            update('users', $id, $datas);
        }

        // Gọi hàm update để cập nhật thông tin người dùng

        // Chuyển hướng sau khi cập nhật thành công
        header('location: ' . BASE_URL_ADM . '?act=user_update&id=' . $id);
        exit();
    }

    // Gọi file giao diện
    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}

// function validateUpdate($id, $datas)
// {
//     $errors = [];
//     if (empty($datas['username'])) {
//         $errors[] = "Không Để trống Name";
//     } else if (strlen($datas['username']) > 50) {
//         $errors[] = "Trường Name Độ Dài TỐi Đã 50 Kí tự !";
//     }

//     if (empty($datas['email'])) {
//         $errors[] = "Không Để trống email";
//     } else if (!filter_var($datas['email'], FILTER_VALIDATE_EMAIL)) {
//         $errors[] = "Trường email Không đúng định dạng !";
//     } else if (!checkUniqueEMailUpdate('users', $id, $datas['email'])) {
//         $errors[] = "Email đã được sử dụng !";
//     }

//     if (empty($datas['password'])) {
//         $errors[] = "Không Để trống password";
//     } else if (strlen($datas['password']) < 8 || strlen($datas['password']) > 20) {
//         $errors[] = "Trường password Độ Dài TỐi Đã 20 và nhỏ nhất 8 Kí tự !";
//     }

//     if (empty($datas['id_role'])) {
//         $errors[] = "Không Để trống role";
//     } else if (!in_array($datas['id_role'], [1, 2])) {
//         $errors[] = "Trường role phải 1 or 2!";
//     }

//     return $errors;
// }

function validateUpdate($id, $datas)
{
    $errors = [];
    if (empty($datas['username'])) {
        $errors[] = "Không Để trống Name";
    } else if (strlen($datas['username']) > 50) {
        $errors[] = "Trường Name Độ Dài Tối Đa 50 Kí tự !";
    }

    if (empty($datas['email'])) {
        $errors[] = "Không Để trống email";
    } else if (!filter_var($datas['email'], FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Trường email không đúng định dạng !";
    } else if (!checkUniqueEMailUpdate('users', $id, $datas['email'])) {
        $errors[] = "Email đã được sử dụng !";
    }

    if (empty($datas['password'])) {
        $errors[] = "Không Để trống password";
    } else if (strlen($datas['password']) < 8 || strlen($datas['password']) > 20) {
        $errors[] = "Trường password phải có độ dài từ 8 đến 20 kí tự!";
    }

    if (empty($datas['id_role'])) {
        $errors[] = "Không Để trống role";
    } else if (!in_array($datas['id_role'], [1, 2])) {
        $errors[] = "Trường role phải là 1 hoặc 2!";
    }

    // Kiểm tra nếu không có lỗi mới trả về mảng rỗng
    if (empty($errors)) {
        return [];
    } else {

        return $errors;
    }
}




function userDelete($id)
{

    delete2('users', $id);
    $_SESSION['suscess'] = "Thao Tác THành Công !";

    header('location: ' . BASE_URL_ADM . '?act=users');
    exit();
    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}
