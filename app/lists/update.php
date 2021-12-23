<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';
$user_id = $_SESSION['user']['id'];
$list_id = $_GET['id'];

if (isset($_POST['title'])) {
    $trimmed_title = trim($_POST['title']);
    $title = filter_var($trimmed_title, FILTER_SANITIZE_STRING);

    $statement = $database->prepare('UPDATE lists SET
    title = :title WHERE id = :id AND user_id = :user_id');

    $statement->bindParam(':title', $title, PDO::PARAM_STR);
    $statement->bindParam(':id', $list_id, PDO::PARAM_INT);
    $statement->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $statement->execute();
    redirect('/individual_list.php?id=' . $list_id);
}
