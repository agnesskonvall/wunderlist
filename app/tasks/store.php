<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

if (isset($_POST['title'], $_POST['description'], $_POST['date'])) {
    $list_id = $_GET['id'];
    $user_id = $_SESSION['user']['id'];
    $trimmed_title = trim($_POST['title']);
    $title = filter_var($trimmed_title, FILTER_SANITIZE_STRING);
    $trimmed_desc = trim($_POST['title']);
    $desc = filter_var($trimmed_desc, FILTER_SANITIZE_STRING);
    $deadline = $_POST['date'];


    $statement = $database->prepare('INSERT INTO tasks
    (title, user_id)
    VALUES
    (:title, :user_id)');

    $statement->bindParam(':title', $title, PDO::PARAM_STR);
    $statement->bindParam(':user_id', $user_id, PDO::PARAM_INT);

    $statement->execute();
    redirect('/lists.php');
}

redirect('/lists.php');
