<?php
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
