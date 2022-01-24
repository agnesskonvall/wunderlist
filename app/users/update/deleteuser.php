<?php

declare(strict_types=1);

require __DIR__ . '/../../autoload.php';

if (isset($_POST['delete_user'])) {
    $user_id = $_SESSION['user']['id'];

    // fetch the user
    $statement = $database->prepare('SELECT * FROM users WHERE id = :id');
    $statement->bindParam(':id', $user_id, PDO::PARAM_INT);
    $statement->execute();
    $user = $statement->fetch(PDO::FETCH_ASSOC);
    // compare the users store password with the password they entered in the form. If there is no match, redirect the user to the profile page.
    if (password_verify($_POST['delete_user'], $user['password'])) {
        //delete all the users tasks
        $statement = $database->prepare('DELETE FROM tasks WHERE user_id = :task_user_id');
        $statement->bindParam(':task_user_id', $user_id, PDO::PARAM_INT);
        $statement->execute();

        $statement = $database->prepare('DELETE FROM lists WHERE user_id = :list_user_id');
        $statement->bindParam(':list_user_id', $user_id, PDO::PARAM_INT);
        $statement->execute();

        $statement = $database->prepare('DELETE FROM users WHERE id = :id');
        $statement->bindParam(':id', $user_id, PDO::PARAM_INT);
        $statement->execute();
        unset($_SESSION['user']);

        redirect('/');
    } else {
        redirect('/profile.php');
    }
}

redirect('/profile.php');
