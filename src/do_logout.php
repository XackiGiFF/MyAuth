<?php

require_once __DIR__.'/application/boot.php';

$_SESSION['user_id'] = null;
header('Location: /');