<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

if (isset($_POST['title'], $_POST['description'], $_POST['date'])) {
    $title = trim($_POST['title']);
    /* hiddeninput  för id*/
}
redirect('/');
