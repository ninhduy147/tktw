<?php
function list_user()
{
    $dataUser = getAllUser();
    require_once PATH_VIEW . 'list_users.php';
}
