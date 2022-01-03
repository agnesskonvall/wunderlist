<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

$user_id = $_SESSION['user']['id'];
$task_id = $_GET['id'];

//new title
if (isset($_POST['title'])) {
    $trimmed_title = trim($_POST['title']);
    $title = filter_var($trimmed_title, FILTER_SANITIZE_STRING);
}

if ($title) {
    $statement = $database->prepare('UPDATE tasks SET title = :title WHERE id = :id');
    $statement->bindParam(':title', $title, PDO::PARAM_STR);
    $statement->bindParam(':id', $task_id, PDO::PARAM_INT);
    $statement->execute();
}
//new content
if (isset($_POST['content'])) {
    $trimmed_content = trim($_POST['content']);
    $content = filter_var($trimmed_content, FILTER_SANITIZE_STRING);
}

if ($content) {
    $statement = $database->prepare('UPDATE tasks SET content = :content WHERE id = :id');
    $statement->bindParam(':content', $content, PDO::PARAM_STR);
    $statement->bindParam(':id', $task_id, PDO::PARAM_INT);
    $statement->execute();
}

//new deadline
if (isset($_POST['deadline'])) {
    $deadline_at = $_POST['deadline'];
}

if ($deadline_at) {
    $statement = $database->prepare('UPDATE tasks SET
    deadline_at = :deadline_at WHERE id = :id');

    $statement->bindParam(':deadline_at', $deadline_at, PDO::PARAM_STR);
    $statement->bindParam(':id', $task_id, PDO::PARAM_INT);
    $statement->execute();
}

//complete task / uncomplete task
if ($_POST['status'] === "completed") {
    $completed_at = date('Y-m-d');

    $statement = $database->prepare('UPDATE tasks SET completed_at = :completed_at
    WHERE id = :id');
    $statement->bindParam(':id', $task_id, PDO::PARAM_INT);
    $statement->bindParam(':completed_at', $completed_at, PDO::PARAM_STR);
    $statement->execute();
} else {
    $statement = $database->prepare('UPDATE tasks SET completed_at = null
    WHERE id = :id');
    $statement->bindParam(':id', $task_id, PDO::PARAM_INT);
    $statement->execute();
}
redirect('/individual_task.php?id=' . $task_id);
