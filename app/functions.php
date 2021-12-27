<?php

declare(strict_types=1);

function redirect(string $path)
{
    header("Location: ${path}");
    exit;
}

function logged_in()
{
    if (isset($_SESSION['user'])) {
        $user = $_SESSION['user'];
        return $user;
    }
}
function welcome()
{
    if (isset($_SESSION['user'])) {
        $name = $_SESSION['user']['name'];
        return $name;
    }
}

function fetch_lists(object $database)
{
    $user_id = $_SESSION['user']['id'];

    $statement = $database->prepare("SELECT * from lists WHERE user_id = :user_id");
    $statement->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $statement->execute();

    $lists = $statement->fetchAll(PDO::FETCH_ASSOC);

    return $lists;
}

function fetch_tasks(object $database)
{
    $user_id = $_SESSION['user']['id'];
    $list_id = $_GET['id'];

    $statement = $database->prepare("SELECT * from tasks WHERE user_id = :user_id AND list_id = :list_id");
    $statement->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $statement->bindParam(':list_id', $list_id, PDO::PARAM_INT);
    $statement->execute();

    $tasks = $statement->fetchAll(PDO::FETCH_ASSOC);

    return $tasks;
}
