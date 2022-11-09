<?php

$pdo = new PDO("mysql:host=localhost:3306;charset=utf8;dbname=app_db", "mysql", "mysql");


function getAll($sql, $params = [])
{
    global $pdo;

    $result = $pdo->prepare($sql);
    foreach ($params as $key => $value) {
        $result->bindValue(":$key", $value);
    }
    $result->execute();
    return $result->fetchAll(PDO::FETCH_ASSOC);
}