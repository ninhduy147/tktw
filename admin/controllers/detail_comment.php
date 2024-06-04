<?php

function detail_comment($id)
{
    $comment = getcommentByID($id);
    $datacomment = getAllcomment();

    require_once PATH_VIEW_ADMIN . 'comments/detail_comment.php';
}
