<?php
if (!function_exists('getAllcomment')) {
    function getAllcomment()
    {
        try {
            $sql =  'SELECT * FROM comments INNER JOIN products ON products.id_product = comments.id_product
                                            INNER JOIN users ON users.id = comments.id';

            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (\Exception $e) {
            debug($e);
        }
    }
}



if (!function_exists('getcomment')) {

    function getcomment()
    {
        try {
            $sql =  'SELECT * FROM comments INNER JOIN products ON products.id_product = comments.id_product
                                            INNER JOIN users ON users.id = comments.id';

            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (\Exception $e) {
            debug($e);
        }
    }
}


if (!function_exists('getcommentUsers')) {

    function getcommentUsers()
    {
        try {
            $sql =  'SELECT * FROM users ';

            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (\Exception $e) {
            debug($e);
        }
    }
}


if (!function_exists('getcommentProduct')) {

    function getcommentProduct()
    {
        try {
            $sql =  'SELECT * FROM products ';

            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (\Exception $e) {
            debug($e);
        }
    }
}


if (!function_exists('getcommentByID')) {

    function getcommentByID($id)
    {
        try {
            $sql =  'SELECT * FROM comments INNER JOIN products ON products.id_product = comments.id_product
                                            INNER JOIN users ON users.id = comments.id
                                            WHERE id_comment = :id_comment';

            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->bindParam(':id_comment', $id);
            $stmt->execute();
            return $stmt->fetch();
        } catch (\Exception $e) {
            debug($e);
        }
    }
}


if (!function_exists('checkUniqueNameCMTUpdate')) {
    function checkUniqueNameCMTUpdate($tableName, $id, $name)
    {
        try {
            $sql = "SELECT * FROM $tableName WHERE content = :content AND id_comment <> :id_comment LIMIT 1";

            $stmt =  $GLOBALS['conn']->prepare($sql);

            $stmt->bindParam(":content", $name);
            $stmt->bindParam(":id_comment", $id);

            $stmt->execute();

            $datas = $stmt->fetch();

            return empty($datas) ? true : false;
        } catch (\Exception $e) {
            debug($e);
        }
    };
};


if (!function_exists('checkUniqueContent')) {
    function checkUniqueContent($tableName, $name)
    {
        try {
            $sql = "SELECT * FROM $tableName WHERE content = :content LIMIT 1";

            $stmt =  $GLOBALS['conn']->prepare($sql);
            $stmt->bindParam(":content", $name);

            $stmt->execute();
            $datas = $stmt->fetch();

            return empty($datas) ? true : false;
        } catch (\Exception $e) {
            debug($e);
        }
    };
};
