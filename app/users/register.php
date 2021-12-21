<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

if (isset($_POST['email'], $_POST['username'], $_POST['password'])) {
    $email = trim($_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $username = trim($_POST['username']);
    /* $i = 0;
    $image = $_FILES['image'][$i];
    $tmp_name = $image['tmp_name'];
    $filetype = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
    $filename = $username . '-image' . "." . $filetype;

    move_uploaded_file($tmp_name, __DIR__ . '../../../../uploads/' . $filename); */


    $statement = $database->prepare('INSERT INTO users
    (user_name, email, password, image_url)
    VALUES
    (:user_name, :email, :password, :image_url)');
    $statement->bindParam(':user_name', $username, PDO::PARAM_STR);
    $statement->bindParam(':email', $email, PDO::PARAM_STR);
    $statement->bindParam(':password', $password, PDO::PARAM_STR);
    $statement->bindParam(':image_url', $filename, PDO::PARAM_STR);



    /* här vill man ha en ifsats som kollar om mailadressen och username redan finns*/
    $statement->execute();

    redirect('/');
}
