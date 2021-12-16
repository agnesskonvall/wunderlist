<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

if (isset($_POST['email'], $_POST['username'], $_POST['password'])) {
    $email = trim($_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $username = trim($_POST['username']);

    $statement = $database->prepare('INSERT INTO users
    (user_name, email, password)
    VALUES
    (:user_name, :email, :password)');
    $statement->bindParam(':user_name', $username, PDO::PARAM_STR);
    $statement->bindParam(':email', $email, PDO::PARAM_STR);
    $statement->bindParam(':password', $password, PDO::PARAM_STR);

    /* här vill man ha en ifsats som kollar om mailadressen och username redan finns*/
    $statement->execute();

    redirect('/');
}
