<?php

// seven.php?start_date=2022-09-01&end_date=2022-10-01&service_id=2&category_id=3

if (!isset($_GET["start_date"]) && !isset($_GET["end_date"])){
    echo json_encode(["error" => "start_date and end_date is required"]);
    exit;
}

if (!isset($_GET["service_id"]) && !isset($_GET["category_id"])){
    echo json_encode(["error" => "service_id and category_id is required"]);
    exit;
}

require 'pdo.php';

$sql_users = 'SELECT DISTINCT `users`.* FROM `reservation_services` JOIN `reservation` ON `reservation`.`id`=`reservation_id` JOIN `rooms` ON `rooms`.`id`=`reservation`.`room_id` JOIN `users` ON `users`.`id`=`reservation`.`user_id` WHERE `service_id`=:service_id and `date_rendering`>:start_date and `date_rendering`<:end_date and `rooms`.`category_id`=:category_id';

$users  = getAll($sql_users, $_GET);

echo json_encode(["count"=> count($users),"data"=>$users]);