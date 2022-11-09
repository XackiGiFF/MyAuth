<?php
require_once __DIR__.'/application/boot.php';

$user = null;

if (check_auth()) {
    // Получим данные пользователя по сохранённому идентификатору
    $stmt = pdo()->prepare("SELECT * FROM `users` WHERE `id` = :id");
    $stmt->execute(['id' => $_SESSION['user_id']]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
}
?>


<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Гостиница</title>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@700&family=Open+Sans:wght@300&display=swap"
          rel="stylesheet">
    <link rel="stylesheet" href="css/main.css">
</head>

<body>
<header class="header">
    <p class="title">
        "Гостиница Larufo"
        <br>Для вас только комфорт и удобство<br>
    </p>

    <nav>
        <ul>
            <li><a href="index.php">Главная</a></li>
            <li><a href="numbers.php">Номера</a></li>
            <li><a href="about_us.php">О нас</a></li>
            <li><a href="contacts.php">Контакты</a></li>
            <li style="margin-left: auto;">
                <?php if (isset($_SESSION['user_id'])) : ?>
                    <a href="profile.php"><img width="35" height="35" src="<?= $user['img_src']?>"
                                               alt="Профиль"><?= $user['register']?></a></li>
                <li><a href="logout.php">Выход</a></li>
                <?php else : ?>
                    <a href="profile.php">Вход/Регистрация</a>
                <?php endif; ?>
            </li>
        </ul>
    </nav>

</header>

<?php if (isset($_SESSION['user_id'])) : ?>
    <form enctype="multipart/form-data" action="/upload.php" method="POST"
          style="width: 600px;display: flex;flex-direction: column;gap: 20px;align-items: center; margin: 20px auto">
        Обновить аватар: <input required name="img" type="file"/>
        <input type="submit" value="Отправить файл"/>
    </form>
<?php else : ?>
    <h1 class="mb-5">Регистрация</h1>
    <?php flash(); ?>
    <form method="post" action="do_register.php" style="width: 600px;display: flex;flex-direction: column;gap: 20px;align-items: center; margin: 20px auto">
    <div class="mb-3">
            <label for="fio" class="form-label">Ф.И.О</label>
            <input type="text" class="form-control" id="fio" name="fio" required>
    </div>
    <div class="mb-3">
            <label for="birthday" class="form-label">День рождения</label>
            <input type="date" id="birthday" name="birthday"
                   value="1970-01-01"
                   min="1970-01-01" max="2015-12-31">
    </div>
    <div class="mb-3">
            <label for="birthday" class="form-label">Пол</label>
            <input type="radio" id="male" name="male"/>
            <label for="male" id="male">male</label>
            <input type="radio" id="female"name="female"/>
            <label for="female" id="female">female</label>
    </div>
    <div class="mb-3">
            <label for="login" class="form-label">login</label>
            <input type="text" class="form-control" id="login" name="login" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <div class="d-flex justify-content-between">
            <button type="submit" class="btn btn-primary">Register</button>
            <a class="btn btn-outline-primary" href="profile.php">Login</a>
        </div>
    </form>


<?php endif; ?>

<footer>
    <div class="container7">
        <h3>
            Подпишитесь на рассылку
        </h3>
        <form action="#">
            <input class="imput" type="text" placeholder="Введите свой email">
            <button class="telegram" type="submit"> Отправить
            </button>
        </form>
    </div>
    <div class="icons_container">
        <img src="/img/youtube.png" alt="">
        <img src="/img/facebook.png" alt="">
        <img src="/img/twitter.png" alt="">
        <img src="/img/instagram.png" alt="">
    </div>
</footer>

</body>

</html>