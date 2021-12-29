<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

if (isset($_GET['id'])) {
    $list_id = $_GET['id'];
    $user_id = $_SESSION['user']['id'];

    $statement = $database->prepare("DELETE FROM lists WHERE user_id = :user_id AND id = :id");
    $statement->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $statement->bindParam(':id', $list_id, PDO::PARAM_INT);
    $statement->execute();

    $_SESSION['messages'][] = 'List deleted from your profile!';

    redirect('/lists.php');
}
