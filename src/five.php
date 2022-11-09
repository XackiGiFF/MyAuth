<?php

require 'pdo.php';

$sql_rooms = 'SELECT `rooms`.*, COUNT(*) as "number of bookings"  FROM `reservation` JOIN `rooms` ON `rooms`.`id`=`room_id` GROUP BY `room_id` LIMIT 10';

$rooms = getAll($sql_rooms, $_GET);

echo json_encode(["count"=> count($rooms),"data"=>$rooms]);