<?php


if (!function_exists('get_str_key')) {
    function get_str_key($data)
    {
        return implode(',', array_map(function ($key) {
            return "`$key`";
        }, array_keys($data)));
    }
}

if (!function_exists('get_virtual_params')) {
    function get_virtual_params($data)
    {
        $keys = array_keys($data);
        $tmp  = [];
        foreach ($keys as $key) {
            $tmp[] = ":$key";
        }
        return implode(',', $tmp);
    }
}

if (!function_exists('get_set_params')) {
    function get_set_params($data)
    {
        $keys = array_keys($data);
        $tmp  = [];
        foreach ($keys as $key) {
            $tmp[] = "`$key` = :$key";
        }
        return implode(',', $tmp);
    }
}

// INSERT 
if (!function_exists('insert')) {
    function insert($tableName, $data = [])
    {
        try {
            $strKey = get_str_key($data);
            $virtualParams = get_virtual_params($data);
            $sql = "INSERT INTO `$tableName` ($strKey) VALUES ($virtualParams)";

            $stmt = $GLOBALS['conn']->prepare($sql);

            foreach ($data as $key => &$val) {
                var_dump($val, $key);
                die;
                $stmt->bindParam(":$key", $val);
            }



            $stmt->execute();
        } catch (\Exception $e) {
            // Xử lý ngoại lệ ở đây
            echo "Error: " . $e->getMessage();
        }
    }
}


//READ All
if (!function_exists('listAll')) {
    function listAll($tableName)
    {
        try {
            $sql = "SELECT * FROM $tableName ";

            $stmt =  $GLOBALS['conn']->prepare($sql);

            $stmt->execute();

            return $stmt->fetchAll();
        } catch (\Exception $e) {
            debug($e);
        }
    };
};
// READ DETAIL USER     
if (!function_exists('showOne')) {
    function showOne($tableName, $id)
    {
        try {
            $sql = "SELECT * FROM $tableName WHERE id = :id LIMIT 1";

            $stmt =  $GLOBALS['conn']->prepare($sql);
            $stmt->bindParam(":id", $id);

            $stmt->execute();

            return $stmt->fetchAll();
        } catch (\Exception $e) {
            debug($e);
        }
    };
};
//UPDATE 
if (!function_exists('update')) {
    function update($tableName, $id, $data = [])
    {
        try {
            $setParams = get_set_params($data);
            $sql = "
                UPDATE $tableName 
                SET   $setParams
                WHERE id = :id
            ";

            $stmt =  $GLOBALS['conn']->prepare($sql);
            foreach ($data as $key => &$val) {
                $stmt->bindParam(":$key", $val);
            }

            // Thêm dấu : vào trước id
            $stmt->bindParam(":id", $id);

            $stmt->execute();
        } catch (\Exception $e) {
            // Xử lý ngoại lệ ở đây
            echo "Error: " . $e->getMessage();
        }
    }
}

//DELETE

if (!function_exists('delete')) {
    function delete($tableName, $id, $data = [])
    {
        try {
            $setParams = get_set_params($data);
            $sql = "
                DELETE 
                FROM $tableName
                WHERE id = :id
            ";

            $stmt =  $GLOBALS['conn']->prepare($sql);

            // Thêm dấu : vào trước id
            $stmt->bindParam(":id", $id);

            $stmt->execute();
        } catch (\Exception $e) {
            // Xử lý ngoại lệ ở đây
            echo "Error: " . $e->getMessage();
        }
    }
}
