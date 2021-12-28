<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $user_id = $_SESSION['user']['id'];

    $statement = $database->prepare("DELETE FROM tasks WHERE user_id = :user_id AND id = :id");
    $statement->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $statement->bindParam(':id', $id, PDO::PARAM_INT);
    $statement->execute();

    $_SESSION['messages'][] = 'Task deleted!';

    redirect('/lists.php');
}
