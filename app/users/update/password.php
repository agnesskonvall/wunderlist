<?php

declare(strict_types=1);

require __DIR__ . '/../../autoload.php';

if (isset($_POST['password'], $_POST['new_password'])) {
    $user_id = $_SESSION['user']['id'];

    //fetch user information from database
    $statement = $database->prepare("SELECT * from users WHERE id = :id");
    $statement->bindParam(':id', $user_id, PDO::PARAM_INT);
    $statement->execute();
    $user = $statement->fetch(PDO::FETCH_ASSOC);

    //check if old password is correct
    if (password_verify($_POST['password'], $user['password'])) {
        $hashed_new_password = password_hash($_POST['new_password'], PASSWORD_DEFAULT);

        //change password in database
        $statement = $database->prepare("UPDATE users SET password = :new_password WHERE id = :id");
        $statement->bindParam(':id', $user_id, PDO::PARAM_INT);
        $statement->bindParam(':new_password', $hashed_new_password, PDO::PARAM_STR);

        $statement->execute();

        $_SESSION['messages'][] = "You have changed your password!";
    }

    redirect('/profile.php');
}
