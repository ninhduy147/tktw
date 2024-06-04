<?php

function detail_tag($id)
{
    $tag = getTagByID($id);
    $dataTag = getAllTag();

    require_once PATH_VIEW_ADMIN . 'tags/detail_tag.php';
}
