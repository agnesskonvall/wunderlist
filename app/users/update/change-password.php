<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

if (isset($_POST['password'])) {
    $user_id = $_SESSION['user']['id'];
}
