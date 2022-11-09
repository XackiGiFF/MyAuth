<?php

$path = "imgs/".time().".jpg";
if (!file_exists('imgs')) {
    mkdir('imgs', 0777, true);
}

move_uploaded_file($_FILES["img"]["tmp_name"], $path);
$_SESSION['user']['img_src'] = $path;
require_once __DIR__.'/application/boot.php';

function getAll($sql, $params = [])
{

    $result = pdo()->prepare($sql);
    foreach ($params as $key => $value) {
        $result->bindValue(":$key", $value);
    }
    $result->execute();
    return $result->fetchAll(PDO::FETCH_ASSOC);
}

getAll("UPDATE `users` SET `img_src`=:img_src WHERE `id`=:id", ["id"=>$_SESSION['user_id'], "img_src"=>$path]);

header('Location: /profile.php');
