<?php

declare(strict_types=1);

require __DIR__ . '../../../autoload.php';


if (isset($_FILES['upload-avatar'])) {
    $tmp_name = $_FILES['upload-avatar']['tmp_name'];
    $filetype = pathinfo($_FILES['upload-avatar']['name'], PATHINFO_EXTENSION);
    $filename = $_SESSION['user']['name'] . '-avatar.' . $filetype;
    move_uploaded_file($tmp_name, __DIR__ . '../../../../uploads/' . $filename);
}
