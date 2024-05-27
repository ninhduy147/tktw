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
    $title = 'Chi Tiết User' . 'ti them ten';
    $view = 'users/detail_user';

    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}

// function userCreate()
// {
//     $title = 'Tạo User';
//     $view = 'users/create';
//     $dataUser = getAllUser();
//     $detail_role = getRole();

//     if (!empty($_POST['btn_add'])) {
//         $data = [
//             "name" => $_POST['name'],
//             "password" => $_POST['password'],
//             "email" => $_POST['email'],
//             "phone" => $_POST['phone'],
//             "type" => $_POST['type'],
//             "avatar" => null,
//         ];

//         // Xử lý file upload avatar
//         if (isset($_FILES['avatar']) && $_FILES['avatar']['error'] == UPLOAD_ERR_OK) {
//             $avatar_tmp_path = $_FILES['avatar']['tmp_name'];
//             $avatar_name = basename($_FILES['avatar']['name']);
//             $file_extension = strtolower(pathinfo($avatar_name, PATHINFO_EXTENSION));

//             // Kiểm tra đuôi file là .jpg
//             if ($file_extension !== 'jpg') {
//                 echo "Only .jpg files are allowed.";
//                 exit();
//             }

//             $avatar_upload_dir = '../img/'; // Đường dẫn thư mục bạn muốn lưu trữ file
//             $avatar_path = $avatar_upload_dir . $avatar_name;

//             // Kiểm tra nếu thư mục uploads tồn tại và có quyền ghi
//             if (!is_dir($avatar_upload_dir)) {
//                 if (!mkdir($avatar_upload_dir, 0777, true)) {
//                     echo "Failed to create upload directory.";
//                     exit();
//                 }
//             }

//             if (!is_writable($avatar_upload_dir)) {
//                 echo "Upload directory is not writable.";
//                 exit();
//             }

//             // Di chuyển file từ thư mục tạm đến thư mục lưu trữ
//             if (move_uploaded_file($avatar_tmp_path, $avatar_path)) {
//                 $data['avatar'] = $avatar_path;
//             } else {
//                 // Xử lý lỗi nếu file không thể di chuyển
//                 echo "Failed to move uploaded file.";
//                 exit();
//             }
//         }

//         // Debug: Hiển thị dữ liệu POST
//         // var_dump($data);

//         insert('users', $data);

//         // if (!$result) {
//         //     die();
//         // };

//         header('location: ' . BASE_URL_ADM . '?act=users');
//         exit();
//     }

//     require_once PATH_VIEW_ADMIN . 'layouts/master.php';
// }


// function userCreate()
// {
//     $title = 'Tạo User';
//     $view = 'users/create';
//     $dataUser = getAllUser();
//     $detail_role = getRole();

//     if (!empty($_POST)) {
//         $data = [
//             "name" => $_POST['name'],
//             "password" => $_POST['password'],
//             "email" => $_POST['email'],
//             "phone" => $_POST['phone'],
//             "type" => $_POST['type'],
//             "avatar" => $_POST['avatar'],
//         ];


//         // Xử lý file upload avatar
//         // if (isset($_FILES['avatar']) && $_FILES['avatar']['error'] == UPLOAD_ERR_OK) {
//         //     $dir = 'img/'; // Đường dẫn thư mục bạn muốn lưu trữ file
//         //     $up_name = time() . ".jpg"; // Đặt tên file theo timestamp
//         //     $upfile = $dir . $up_name; // Đường dẫn đầy đủ đến file mới
//         //     // Di chuyển file từ thư mục tạm đến thư mục lưu trữ

//         // }

//         // Debug: Hiển thị dữ liệu POST
//         var_dump($data);
//         die;

//         insert('users', $data);

//         // if (!$result) {
//         //     die();
//         // };

//         header('location: ' . BASE_URL_ADM . '?act=users');
//         exit();
//     }

//     require_once PATH_VIEW_ADMIN . 'layouts/master.php';
// }


function userCreate()
{
    $title = 'Tạo User';
    $view = 'users/create';
    $dataUser = getAllUser();
    $detail_role = getRole();

    if (!empty($_POST)) {
        $data = [
            "name" => $_POST['name'],
            "password" => $_POST['password'],
            "email" => $_POST['email'],
            "phone" => $_POST['phone'],
            "type" => $_POST['type'],
        ];

        if (isset($_FILES['avatar']) && $_FILES['avatar']['error'] == UPLOAD_ERR_OK) {
            $dir = "../img/";
            $up_name = time() . ".jpg";
            $upfile = $dir . $up_name;
            if (move_uploaded_file($_FILES['avatar']['tmp_name'], $upfile)) {
                $data['avatar'] = $upfile;
            } else {
                echo 'Failed to move uploaded file.';
                exit();
            }
        } else {
            $data['avatar'] = null; // Hoặc bạn có thể đặt giá trị mặc định khác
        }



        insert('users', $data);

        header('location: ' . BASE_URL_ADM . '?act=users');
        exit();
    }

    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}


function userUpdate($id)
{
    $title = 'Update User' . 'ti them id';
    $view = 'users/update';

    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}

function userDelete($id)
{

    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}
