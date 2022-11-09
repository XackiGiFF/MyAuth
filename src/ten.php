<?php

require 'pdo.php';

$sql_additional_services = 'SELECT * FROM `additional_services`';

$additional_services = getAll($sql_additional_services, $_GET);

echo json_encode(["count"=> count($additional_services),"data"=>$additional_services]);