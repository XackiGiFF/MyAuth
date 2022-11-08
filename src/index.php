<?php
require_once __DIR__.'/boot.php';

$user = null;

if (check_auth()) {
    // Получим данные пользователя по сохранённому идентификатору
    $stmt = pdo()->prepare("SELECT * FROM `users` WHERE `id` = :id");
    $stmt->execute(['id' => $_SESSION['user_id']]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
}
?>
<?php if ($user) { ?>

    <h1>Добро пожаловать, <?=htmlspecialchars($user['username'])?>!</h1>
    <?php echo base64_decode("PGgyPtCh0LvQtdC00YPRjtGJ0LXQtSDQt9Cw0LTQsNC90LjQtSAtINGB0L7Qt9C00LDRgtGMINGH0LDRgiwg0LjRgdC/0L7Qu9GM0LfRg9GPINC40LzQtdC90LAg0L/QvtC70YzQt9C+0LLQsNGC0LXQu9C10LkuINCl0YDQsNC90LjRgtGMINGB0L7QvtCx0YnQtdC90LjRjyDQvdC10L7QsdGF0L7QtNC40LzQviDQsiDQsdCw0LfQtSDQtNCw0L3QvdGL0YUuPC9oMj4="); ?>
    <form class="mt-5" method="post" action="do_logout.php">
        <button type="submit" class="btn btn-primary">Выйти</button>
    </form>

<?php } else { ?>

    <h1 class="mb-5">Регистрация</h1>

    <?php flash(); ?>

    <form method="post" action="do_register.php">
  <div class="mb-3">
    <label for="username" class="form-label">Username</label>
    <input type="text" class="form-control" id="username" name="username" required>
  </div>
  <div class="mb-3">
    <label for="password" class="form-label">Password</label>
    <input type="password" class="form-control" id="password" name="password" required>
  </div>
  <button type="submit" class="btn btn-primary">Register</button>
  <a class="btn btn-outline-primary" href="login.php">Login</a>
</form>

<?php } ?>