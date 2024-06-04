<?php

function getAllCategory()
{
    try {
        $sql =  'SELECT * FROM categories ';

        $stmt = $GLOBALS['conn']->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    } catch (\Exception $e) {
        debug($e);
    }
}




if (!function_exists('checkUniqueNameCate')) {
    function checkUniqueNameCate($tableName, $name)
    {
        try {
            $sql = "SELECT * FROM $tableName WHERE name_category = :name_category LIMIT 1";

            $stmt =  $GLOBALS['conn']->prepare($sql);
            $stmt->bindParam(":name_category", $name);

            $stmt->execute();
            $datas = $stmt->fetch();

            return empty($datas) ? true : false;
        } catch (\Exception $e) {
            debug($e);
        }
    };
};

if (!function_exists('checkUniqueNameCateUpdate')) {
    function checkUniqueNameCateUpdate($tableName, $id, $name)
    {
        try {
            $sql = "SELECT * FROM $tableName WHERE name_category = :name_category AND category_id <> :category_id LIMIT 1";

            $stmt =  $GLOBALS['conn']->prepare($sql);

            $stmt->bindParam(":name_category", $name);
            $stmt->bindParam(":category_id", $id);

            $stmt->execute();

            $datas = $stmt->fetch();

            return empty($datas) ? true : false;
        } catch (\Exception $e) {
            debug($e);
        }
    };
};
