<?php

// four.php?category_id=2

if (!isset($_GET["category_id"])){
    echo json_encode(["error" => "category_id is required"]);
    exit;
}

require 'pdo.php';

$sql_rooms = 'SELECT * FROM `rooms` WHERE `category_id`=:category_id';

$rooms = getAll($sql_rooms, $_GET);

echo json_encode(["count"=> count($rooms),"data"=>$rooms]);