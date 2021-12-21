<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

if (isset($_POST['user_name'], $_POST['email'], $_POST['password'])) {
    $user_name = trim($_POST['user_name']);
    $email = trim($_POST['email']);
    $hashed_password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    //check if email address already exists in database:
    $statement = $database->prepare('SELECT email FROM users WHERE email = :email');
    $statement->bindParam(':email', $email, PDO::PARAM_STR);
    $statement->execute();
    $compareEmail = $statement->fetch(PDO::FETCH_ASSOC);
    if ($compareEmail !== false) {
        $_SESSION['errors'][] = "This email aldready exists, try another one.";
        redirect('/register.php');
    }

    //check if user name already exists in database:
    $statement = $database->prepare('SELECT user_name FROM users WHERE user_name = :user_name');
    $statement->bindParam(':user_name', $user_name, PDO::PARAM_STR);
    $statement->execute();
    $compareUsername = $statement->fetch(PDO::FETCH_ASSOC);
    if ($compareUsername !== false) {
        $_SESSION['errors'][] = "This username already exist, try another one.";
        redirect('/register.php');
    }

    //insert new user in database
    $statement = $database->prepare('INSERT INTO users
    (user_name, email, password)
    VALUES
    (:user_name, :email, :password)');

    $statement->bindParam(':user_name', $user_name, PDO::PARAM_STR);
    $statement->bindParam(':email', $email, PDO::PARAM_STR);
    $statement->bindParam(':password', $hashed_password, PDO::PARAM_STR);

    $statement->execute();

    redirect('/');
}
