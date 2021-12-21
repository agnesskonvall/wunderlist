<?php

declare(strict_types=1);

require __DIR__ . '../../../autoload.php';


if (isset($_FILES['image'])) {
    $tmp_name = $_FILES['image']['tmp_name'];
    $filetype = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
    $filename = $_SESSION['user']['id'] . '-avatar.' . $filetype;
    move_uploaded_file($tmp_name, __DIR__ . '../../../../uploads/' . $filename);
    redirect('/');
}
