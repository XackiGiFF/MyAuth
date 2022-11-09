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
   <section class="updates">
      <h1 class="headlines">
         Акции
      </h1>
      <ul class="list">
         <li class="item">
            <img class="line" src="img/line1.png" alt="Обводка">
            <p class="img_title">Последний день скидок</p>
            <img class="face" src="img/number1.png" alt="книжка">
            <p class="name">Двухместный номер (24ч)</p>
            <span class="price">$18.99</span>
         </li>
         <li class="item">
            <img class="line" src="img/line1.png" alt="Обводка">
            <p class="img_title">Последний день скидок</p>
            <img class="face" src="img/number2.png" alt="книжка">
            <p class="name">Двухместный номер (24ч)</p>
            <span class="price">$18.99</span>
         </li>
      </ul>
      <div class="square"></div>
   </section>
   <section class="video">
      <div class="video_container">
         <h2 class="history">
            Мы вживую
         </h2>
         <p class="opisanie">
            В этом видео Вы сможете ознакомиться с<br>
            атмосферой и прекрасными видами нашей гостиницы.<br>
            Просто кликните на «Play»!
         </p>
         <iframe width="560" height="315" src="https://www.youtube.com/embed/5WRmcMjGdGU" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
         <!-- <div class="a"></div> -->
         <a class="button" href="#">Читать больше</a>
         <img class="line2" src="img/line3.png" alt="">
      </div>
   </section>
   <section class="reveiw">
      <h2> Отзывы </h2>
      <div class="container">
         <div class="reveiw_container">
            <img class="comma" src="img/virgule.png" alt="Запятая">
            <p>Очень приятно провела время,<br>
               Персонал превосходно выполнил<br>
               свою работу</p>
            <p class="reveiw_p">
               Арина Мещенко
                </p>
         </div>
         <div class="reveiw_container">
            <img class="comma" src="img/virgule.png" alt="Запятая">
            <p>Скажем «Нет!» клишированности и<br>
               банальности. Хорошее обслуживание,<br>
               классные цены, в целом<br>
               пять из пяти. </p>
            <p class="reveiw_p">
               Кирилл Головкин
            </p>
         </div>
         <div class="reveiw_container">
            <img class="comma" src="img/virgule.png" alt="Запятая">
            <p>Удивлена, насколько хорошо<br>
               получилось взять номер,<br>
               Спасибо сотрудникам. <br>
               В номере чисто и опрятно!</p>
            <p class="reveiw_p">
              Мира Петрова
            </p>
         </div>
      </div>
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