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

// READ DETAIL Tag    
if (!function_exists('showOneTag')) {
    function showOneTag($tableName, $id)
    {
        try {
            $sql = "SELECT * FROM $tableName WHERE id_product = :id_product LIMIT 1";

            $stmt =  $GLOBALS['conn']->prepare($sql);
            $stmt->bindParam(":id_product", $id);

            $stmt->execute();

            return $stmt->fetch();
        } catch (\Exception $e) {
            debug($e);
        }
    };
};


// READ DETAIL Comment    
if (!function_exists('showOnecomment')) {
    function showOnecomment($tableName, $id)
    {
        try {
            $sql = "SELECT * FROM $tableName WHERE id_comment = :id_comment LIMIT 1";

            $stmt =  $GLOBALS['conn']->prepare($sql);
            $stmt->bindParam(":id_comment", $id);

            $stmt->execute();

            return $stmt->fetch();
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

            return $stmt->fetch();
        } catch (\Exception $e) {
            debug($e);
        }
    };
};

// READ DETAIL     
if (!function_exists('showOneCate')) {
    function showOneCate($tableName, $id)
    {
        try {
            $sql = "SELECT * FROM $tableName WHERE category_id = :category_id LIMIT 1";

            $stmt =  $GLOBALS['conn']->prepare($sql);
            $stmt->bindParam(":category_id", $id);

            $stmt->execute();

            return $stmt->fetch();
        } catch (\Exception $e) {
            debug($e);
        }
    };
};
//UPDATE users
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


//UPDATE Tags
if (!function_exists('update_tag')) {
    function update_tag($tableName, $id, $data = [])
    {
        try {
            $setParams = get_set_params($data);
            $sql = "
                UPDATE $tableName 
                SET   $setParams
                WHERE id_product = :id_product
            ";

            $stmt =  $GLOBALS['conn']->prepare($sql);
            foreach ($data as $key => &$val) {
                $stmt->bindParam(":$key", $val);
            }

            // Thêm dấu : vào trước id
            $stmt->bindParam(":id_product", $id);

            $stmt->execute();
        } catch (\Exception $e) {
            // Xử lý ngoại lệ ở đây
            echo "Error: " . $e->getMessage();
        }
    }
}


//UPDATE Comment
if (!function_exists('update_comment')) {
    function update_comment($tableName, $id, $data = [])
    {
        try {
            $setParams = get_set_params($data);
            $sql = "
                UPDATE $tableName 
                SET   $setParams
                WHERE id_comment = :id_comment
            ";

            $stmt =  $GLOBALS['conn']->prepare($sql);
            foreach ($data as $key => &$val) {
                $stmt->bindParam(":$key", $val);
            }

            // Thêm dấu : vào trước id
            $stmt->bindParam(":id_comment", $id);

            $stmt->execute();
        } catch (\Exception $e) {
            // Xử lý ngoại lệ ở đây
            echo "Error: " . $e->getMessage();
        }
    }
}


//UPDATE Category
if (!function_exists('update_cate')) {
    function update_cate($tableName, $id, $data = [])
    {
        try {
            $setParams = get_set_params($data);
            $sql = "
                UPDATE $tableName 
                SET   $setParams
                WHERE category_id = :category_id
            ";

            $stmt =  $GLOBALS['conn']->prepare($sql);
            foreach ($data as $key => &$val) {
                $stmt->bindParam(":$key", $val);
            }

            // Thêm dấu : vào trước id
            $stmt->bindParam(":category_id", $id);

            $stmt->execute();
        } catch (\Exception $e) {
            // Xử lý ngoại lệ ở đây
            echo "Error: " . $e->getMessage();
        }
    }
}

//DELETE Users

if (!function_exists('delete2')) {
    function delete2($tableName, $id, $data = [])
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
            // Xử lý ngoại lệ ở đâys
            echo "Error: " . $e->getMessage();
        }
    }
}


//DELETE Cate

if (!function_exists('delete4')) {
    function delete4($tableName, $id, $data = [])
    {
        try {
            $setParams = get_set_params($data);
            $sql = "
                DELETE 
                FROM $tableName
                WHERE category_id = :category_id
            ";

            $stmt =  $GLOBALS['conn']->prepare($sql);

            // Thêm dấu : vào trước category_id
            $stmt->bindParam(":category_id", $id);

            $stmt->execute();
        } catch (\Exception $e) {
            // Xử lý ngoại lệ ở đâys
            echo "Error: " . $e->getMessage();
        }
    }
}


//DELETE Comment

if (!function_exists('delete5')) {
    function delete5($tableName, $id, $data = [])
    {
        try {
            $setParams = get_set_params($data);
            $sql = "
                DELETE 
                FROM $tableName
                WHERE id_comment = :id_comment
            ";

            $stmt =  $GLOBALS['conn']->prepare($sql);

            // Thêm dấu : vào trước id_comment
            $stmt->bindParam(":id_comment", $id);

            $stmt->execute();
        } catch (\Exception $e) {
            // Xử lý ngoại lệ ở đâys
            echo "Error: " . $e->getMessage();
        }
    }
}


//DELETE Tags

if (!function_exists('delete3')) {
    function delete3($tableName, $id, $data = [])
    {
        try {
            $setParams = get_set_params($data);
            $sql = "
                DELETE 
                FROM $tableName
                WHERE id_product = :id_product
            ";

            $stmt =  $GLOBALS['conn']->prepare($sql);

            // Thêm dấu : vào trước id_product
            $stmt->bindParam(":id_product", $id);

            $stmt->execute();
        } catch (\Exception $e) {
            // Xử lý ngoại lệ ở đâys
            echo "Error: " . $e->getMessage();
        }
    }
}



if (!function_exists('checkUniqueName')) {
    function checkUniqueName($tableName, $name)
    {
        try {
            $sql = "SELECT * FROM $tableName WHERE name = :name LIMIT 1";

            $stmt =  $GLOBALS['conn']->prepare($sql);
            $stmt->bindParam(":name", $name);

            $stmt->execute();
            $datas = $stmt->fetch();

            return empty($datas) ? true : false;
        } catch (\Exception $e) {
            debug($e);
        }
    };
};




if (!function_exists('checkUniqueNameUpdate')) {
    function checkUniqueNameUpdate($tableName, $id, $name)
    {
        try {
            $sql = "SELECT * FROM $tableName WHERE name = :name AND id <> :id LIMIT 1";

            $stmt =  $GLOBALS['conn']->prepare($sql);

            $stmt->bindParam(":name", $name);
            $stmt->bindParam(":id", $id);

            $stmt->execute();

            $datas = $stmt->fetch();

            return empty($datas) ? true : false;
        } catch (\Exception $e) {
            debug($e);
        }
    };
};
