<?php

function detail_user($id)
{
    $user = getUserByID($id);
    $dataUser = getAllUser();

    require_once PATH_VIEW_ADMIN . 'users/detail_user.php';
}
