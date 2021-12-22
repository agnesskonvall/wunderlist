<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

if (isset($_POST['username'], $_POST['email'], $_POST['password'])) {
    $username = trim($_POST['username']);
    $trimmed_email = trim($_POST['email']);
    $email = filter_var($trimmed_email, FILTER_SANITIZE_EMAIL);
    $hashed_password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    //check if email address already exists in database:
    $statement = $database->prepare('SELECT email FROM users WHERE email = :email');
    $statement->bindParam(':email', $email, PDO::PARAM_STR);
    $statement->execute();
    $compareEmail = $statement->fetch(PDO::FETCH_ASSOC);
    if ($compareEmail) {
        $_SESSION['errors'][] = "This email aldready exists, try another one.";
        redirect('/register.php');
    }

    //check if user name already exists in database:
    $statement = $database->prepare('SELECT username FROM users WHERE username = :username');
    $statement->bindParam(':username', $username, PDO::PARAM_STR);
    $statement->execute();
    $checkUsername = $statement->fetch(PDO::FETCH_ASSOC);
    if ($checkUsername) {
        $_SESSION['errors'][] = "This username already exist, try another one.";
        redirect('/register.php');
    }

    //insert new user in database
    $statement = $database->prepare('INSERT INTO users
    (username, email, password)
    VALUES
    (:username, :email, :password)');

    $statement->bindParam(':username', $username, PDO::PARAM_STR);
    $statement->bindParam(':email', $email, PDO::PARAM_STR);
    $statement->bindParam(':password', $hashed_password, PDO::PARAM_STR);

    $statement->execute();

    redirect('/');
}
