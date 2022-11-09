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
                                               alt="Профиль"><?= $user['login']?></a></li>
                <li><a href="logout.php">Выход</a></li>
                <?php else : ?>
                    <a href="profile.php">Вход/Регистрация</a>
                <?php endif; ?>
            </li>
        </ul>
    </nav>

   </header>
   <div class="cvadrat2"></div>
   <section class="contact">
      <h2 class="title3">
         Связаться с нами
      </h2>
      <p class="opisanie1"> Получит: Андрей Баженов<br>
         123-456-7890 <br>
         coolsites@gmail.com</p>
      <p class="opisanie2">
         Если хотите забронировать номер, напишите нам письмо
      </p>
      <form class="forma" action="#">
         <div class="form_container">
            <input class="form_container1" type="text" placeholder="Имя">
         </div>
         <div class="form_container">
            <input class="form_container1" type="text" placeholder="Email">
         </div>
         <div class="form_container5">
            <input class="form_container2" type="text" placeholder="Ваше письмо">
         </div>
         <a class="button2" href="#">Отправить</a>
      </form>
   </section>
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