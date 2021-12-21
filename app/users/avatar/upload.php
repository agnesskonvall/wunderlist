<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';


if (isset($_FILES['avatar'])) {
    move_uploaded_file($_FILES['avatar']['tmp_name'], __DIR__ . './uploads');
}
