<?php
if (!function_exists('getAllUser')) {
    function getAllUser()
    {
        try {
            $sql =  'SELECT * FROM users INNER JOIN detail_role ON users.id_role = detail_role.id_role';

            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (\Exception $e) {
            debug($e);
        }
    }
}

if (!function_exists('getRole')) {

    function getRole()
    {
        try {
            $sql =  'SELECT * FROM detail_role';

            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (\Exception $e) {
            debug($e);
        }
    }
}

if (!function_exists('getUserByID')) {

    function getUserByID($id)
    {
        try {
            $sql =  'SELECT * FROM users WHERE id = :id';

            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return $stmt->fetch();
        } catch (\Exception $e) {
            debug($e);
        }
    }
}
if (!function_exists('checkUniqueEMail')) {
    function checkUniqueEMail($tableName, $email)
    {
        try {
            $sql = "SELECT * FROM $tableName WHERE email = :email LIMIT 1";

            $stmt =  $GLOBALS['conn']->prepare($sql);
            $stmt->bindParam(":email", $email);

            $stmt->execute();
            $datas = $stmt->fetch();

            return empty($datas) ? true : false;
        } catch (\Exception $e) {
            debug($e);
        }
    };
};

if (!function_exists('checkUniqueEMailUpdate')) {
    function checkUniqueEMailUpdate($tableName, $id, $email)
    {
        try {
            $sql = "SELECT * FROM $tableName WHERE email = :email AND id <> :id LIMIT 1";

            $stmt =  $GLOBALS['conn']->prepare($sql);

            $stmt->bindParam(":email", $email);
            $stmt->bindParam(":id", $id);

            $stmt->execute();

            $datas = $stmt->fetch();

            return empty($datas) ? true : false;
        } catch (\Exception $e) {
            debug($e);
        }
    };
};



if (!function_exists('getUserAdminByEmailAndPassword')) {
    function getUserAdminByEmailAndPassword($email, $password)
    {
        try {
            $sql = "SELECT * FROM users WHERE email = :email AND password = :password AND id_role = 1 LIMIT 1";

            $stmt =  $GLOBALS['conn']->prepare($sql);

            $stmt->bindParam(":email", $email);
            $stmt->bindParam(":password", $password);

            $stmt->execute();

            $datas = $stmt->fetch();

            return empty($datas) ? true : false;
        } catch (\Exception $e) {
            debug($e);
        }
    };
};
