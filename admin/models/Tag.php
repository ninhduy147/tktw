<?php
if (!function_exists('getAllTag')) {
    function getAllTag()
    {
        try {
            $sql =  'SELECT * FROM products INNER JOIN categories ON products.category_id = categories.category_id';

            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (\Exception $e) {
            debug($e);
        }
    }
}



if (!function_exists('getTag')) {

    function getTag()
    {
        try {
            $sql =  'SELECT * FROM categories';

            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (\Exception $e) {
            debug($e);
        }
    }
}


if (!function_exists('getTagByID')) {

    function getTagByID($id)
    {
        try {
            $sql =  'SELECT * FROM products WHERE id_product = :id_product';

            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->bindParam(':id_product', $id);
            $stmt->execute();
            return $stmt->fetch();
        } catch (\Exception $e) {
            debug($e);
        }
    }
}


if (!function_exists('checkUniqueNameCateUpdate')) {
    function checkUniqueNameCateUpdate($tableName, $id, $name)
    {
        try {
            $sql = "SELECT * FROM $tableName WHERE name = :name AND id_product <> :id_product LIMIT 1";

            $stmt =  $GLOBALS['conn']->prepare($sql);

            $stmt->bindParam(":name", $name);
            $stmt->bindParam(":id_product", $id);

            $stmt->execute();

            $datas = $stmt->fetch();

            return empty($datas) ? true : false;
        } catch (\Exception $e) {
            debug($e);
        }
    };
};
