<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

if (isset($_POST['title'], $_POST['content'], $_POST['deadline'])) {
    $list_id = $_GET['id'];
    $user_id = $_SESSION['user']['id'];
    $trimmed_title = trim($_POST['title']);
    $title = filter_var($trimmed_title, FILTER_SANITIZE_STRING);
    $trimmed_content = trim($_POST['content']);
    $content = filter_var($trimmed_content, FILTER_SANITIZE_STRING);
    $deadline_at = $_POST['deadline'];
    $created_at = date('Y-m-d');


    $statement = $database->prepare('INSERT INTO tasks
    (list_id, title, user_id, content, created_at, deadline_at)
    VALUES
    (:list_id, :title, :user_id, :content, :created_at, :deadline_at)');

    $statement->bindParam(':list_id', $list_id, PDO::PARAM_INT);
    $statement->bindParam(':title', $title, PDO::PARAM_STR);
    $statement->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $statement->bindParam(':content', $content, PDO::PARAM_STR);
    $statement->bindParam(':deadline_at', $deadline_at, PDO::PARAM_STR);
    $statement->bindParam(':created_at', $created_at, PDO::PARAM_STR);

    $statement->execute();
    redirect('/individual_list.php?id=' . $list_id);
}
