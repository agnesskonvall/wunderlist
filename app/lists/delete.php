<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

/// i tried with a innerjoin but just got errors, this is that code: $statement = $database->prepare("DELETE lists, tasks
///FROM lists INNER JOIN tasks ON tasks.list_id = lists.id WHERE user_id = :user_id AND list.id = :id");


if (isset($_GET['id'])) {
    $list_id = $_GET['id'];
    $user_id = $_SESSION['user']['id'];

    $statement = $database->prepare("DELETE FROM lists WHERE user_id = :user_id AND id = :id");
    $statement->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $statement->bindParam(':id', $list_id, PDO::PARAM_INT);
    $statement->execute();

    $statement = $database->prepare("DELETE FROM tasks WHERE user_id = :user_id AND list_id = :id");
    $statement->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $statement->bindParam(':id', $list_id, PDO::PARAM_INT);
    $statement->execute();

    redirect('/lists.php');
}
