<?php
session_start();

require("connect.php");


function tt($value) {
        echo '<pre>';
        print_r($value);
        echo '</pre>';
    }



function selectAll($table) {
global $pdo;
$sql = "SELECT * FROM $table";
$query = $pdo->prepare($sql);
$query->execute();
$errInfo = $query->errorInfo();

  if ($errInfo[0] !== PDO::ERR_NONE) {
    echo $errInfo[2];
    exit();
}


return $query->fetch();
}



function dbCheckError($query) {
    $errInfo = $query->errorInfo();
    if ($errInfo[0] !== PDO::ERR_NONE) {
        echo $errInfo[2];
        exit();
    }
}



function selectOne($table, $conditions) {
    global $pdo;
    $sql = "SELECT * FROM $table WHERE ";
    $whereClauses = [];
    foreach ($conditions as $key => $value) {
        $whereClauses[] = "$key = :$key";
    }
    $sql .= implode(" AND ", $whereClauses);
    $sql .= " LIMIT 1";

    $query = $pdo->prepare($sql);
    foreach ($conditions as $key => $value) {
        $query->bindValue(":$key", $value);
    }
    $query->execute();
    dbCheckError($query);
    return $query->fetch(PDO::FETCH_ASSOC);
}

//Запись в базу данных

function insert($table, $params) {
    global $pdo;
    $columns = implode(", ", array_keys($params));
    $values = implode(", ", array_map(fn($key) => ":$key", array_keys($params)));
    $sql = "INSERT INTO $table ($columns) VALUES ($values)";

    $query = $pdo->prepare($sql);
    foreach ($params as $key => $value) {
        $query->bindValue(":$key", $value);
    }

    $query->execute();
    dbCheckError($query);
    return $pdo->lastInsertId(); 
}

//tt($sql);
//exit();

function avatarSecurity($avatar) {
    $blacklist = $blacklist ?? [];
    $name = $avatar['name'];
    $type = $avatar['type'];
    $size = $avatar['size'];
    $blcklist = array(".html", ".stl", ".swf", ".spl", ".url", ".vb", ".php", ".js");

    foreach($blacklist as $row) {
        if(preg_match("/$row\$/i", $name)) return false;
    }

    if ($type != "image/png" && $type != "image/jpeg" && $type != "image/jpg") return false;
    if ($size > 5 * 1024 * 1024) return false;

    return true;
}   







//Обновление строки в базе данных

function update($table, $id, $params) {
    global $pdo;
    $i = 0;
    $str = '';
    $coll = '';
    $mask = '';
    foreach ($params as $key => $value) {
        if ($i === 0) {
            $str = $str .$key . " = '" . $value . "'";
        } else {
            $str = $str .", " . $key . " = '" . $value . "'";
        }
        $i++;
    }
    
    
    $sql = "UPDATE $table SET $str WHERE id = $id";
    
//    tt($sql);
//    exit();
     
    $query = $pdo->prepare($sql);
    $query->execute($arrData);
    dbCheckError($query);
    
    
    $param =[
        'admin' => 0,
        'password' => 'niganiganiggerniggernigauaaaaaaaaaaaaaaaa',
        'email' => 'negrshtrafostan@gmail.com'
    ];


}

//Удаление строки в базе данных
function delete($table, $id) {
    global $pdo;
    
    $sql = "DELETE FROM $table WHERE id = $id";
    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);

}


    