<?php

require_once __DIR__.'/application/boot.php';

// Проверим, не занято ли имя пользователя
$stmt = pdo()->prepare("SELECT * FROM `users` WHERE `login` = :login");
$stmt->execute(['login' => $_POST['login']]);
if ($stmt->rowCount() > 0) {
    flash('Это имя пользователя уже занято.');
    header('Location: /'); // Возврат на форму регистрации
    die; // Остановка выполнения скрипта
}

// Добавим пользователя в базу
$stmt = pdo()->prepare("INSERT INTO `users` (`fio`, `login`, `password`, `birthday`, `img_src`, `gender`) VALUES (:fio, :login, :password, :birthday, :img_src, :gender)");
$gender = isset($_POST['female']) ? 0 : 1;
$img = isset($_POST['img_src']) ? $_POST['img_src'] : 'imgs/1662816684.jpg';
$stmt->execute([
    'fio' => $_POST['fio'],
    'login' => $_POST['login'],
    'password' => password_hash($_POST['password'], PASSWORD_DEFAULT),
    'birthday' => $_POST['birthday'],
    'img_src' => $img,
    'gender' => $gender,
]);

header('Location: login.php');