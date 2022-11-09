<?php

// eight.php?start_date=2022-09-01&end_date=2022-10-01

if (!isset($_GET["start_date"]) && !isset($_GET["end_date"])){
    echo json_encode(["error" => "start_date and end_date is required"]);
    exit;
}

require 'pdo.php';

$sql_users = 'SELECT `users`.*, `rooms`.`number` as "room number", `category`.`name`  as "room category" FROM `reservation` JOIN `rooms` ON `rooms`.`id`=`room_id` JOIN `category` ON `category`.`id`=`rooms`.`category_id` JOIN `users` ON `users`.`id`=`user_id` WHERE `eviction_date`>:start_date and `eviction_date`<:end_date ';

$users  = getAll($sql_users, $_GET);

echo json_encode(["count"=> count($users),"data"=>$users]);