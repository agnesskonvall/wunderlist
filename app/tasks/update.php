<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

$tasks = fetch_tasks($database);
$user_id = $_SESSION['user']['id'];
$task_id = $_GET['id'];

if (isset($_POST['title'], $_POST['content'], $_POST['deadline'])) {
    $trimmed_title = trim($_POST['title']);
    $title = filter_var($trimmed_title, FILTER_SANITIZE_STRING);
    $trimmed_content = trim($_POST['content']);
    $content = filter_var($trimmed_content, FILTER_SANITIZE_STRING);
    $deadline_at = $_POST['deadline'];


    $statement = $database->prepare('UPDATE tasks SET
    (title, content, deadline_at)
    VALUES
    (:title, :content, :deadline_at)');

    $statement->bindParam(':title', $title, PDO::PARAM_STR);
    $statement->bindParam(':content', $content, PDO::PARAM_STR);
    $statement->bindParam(':deadline_at', $deadline_at, PDO::PARAM_STR);

    $statement->execute();
    redirect('/individual_list.php?id=' . $list_id);
}
redirect('/');
