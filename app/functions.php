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

function fetch_tasks(PDO $database)
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

function fetch_all_tasks(PDO $database)
{
    $user_id = $_SESSION['user']['id'];

    $statement = $database->prepare("SELECT tasks.id, tasks.deadline_at, tasks.list_id, tasks.user_id, tasks.completed_at, tasks.title, tasks.content, lists.title AS list_title FROM tasks INNER JOIN lists
    ON tasks.list_id = lists.id WHERE tasks.user_id = :user_id");
    $statement->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $statement->execute();

    $tasks = $statement->fetchAll(PDO::FETCH_ASSOC);

    return $tasks;
}

function fetch_all_current_tasks(PDO $database)
{
    $user_id = $_SESSION['user']['id'];
    $deadline_at = date('Y-m-d');

    $statement = $database->prepare("SELECT tasks.id, tasks.deadline_at, tasks.list_id, tasks.user_id, tasks.completed_at, tasks.title, tasks.content, lists.title AS list_title FROM tasks INNER JOIN lists
    ON tasks.list_id = lists.id WHERE tasks.user_id = :user_id AND tasks.completed_at IS NULL AND tasks.deadline_at = :deadline_at");
    $statement->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $statement->bindParam(':deadline_at', $deadline_at, PDO::PARAM_STR);

    $statement->execute();

    $current_tasks = $statement->fetchAll(PDO::FETCH_ASSOC);

    return $current_tasks;
}

function task_status($task)
{
    if (isset($task['completed_at'])) {
        $status['completed'] = 'checked';
        $status['uncompleted'] = '';
    } else {
        $status['completed'] = '';
        $status['uncompleted'] = 'checked';
    }

    return $status;
}
function fetch_all_uncompleted_tasks(PDO $database)
{
    $user_id = $_SESSION['user']['id'];

    $statement = $database->prepare("SELECT tasks.id, tasks.deadline_at, tasks.list_id, tasks.user_id, tasks.completed_at, tasks.title, tasks.content, lists.title AS list_title FROM tasks INNER JOIN lists
    ON tasks.list_id = lists.id WHERE tasks.user_id = :user_id AND tasks.completed_at IS NULL");
    $statement->bindParam(':user_id', $user_id, PDO::PARAM_INT);

    $statement->execute();

    $tasks = $statement->fetchAll(PDO::FETCH_ASSOC);

    return $tasks;
}
function fetch_all_completed_tasks(PDO $database)
{
    $user_id = $_SESSION['user']['id'];

    $statement = $database->prepare("SELECT * from tasks WHERE user_id = :user_id AND completed_at IS NOT null");
    $statement->bindParam(':user_id', $user_id, PDO::PARAM_INT);

    $statement->execute();

    $completed_tasks = $statement->fetchAll(PDO::FETCH_ASSOC);

    return count($completed_tasks);
}
function get_image_url(PDO $database)
{
    $user_id = $_SESSION['user']['id'];

    $statement = $database->prepare("SELECT image_url FROM users WHERE id = :id");
    $statement->bindParam(':id', $user_id, PDO::PARAM_INT);

    $statement->execute();
    $image = $statement->fetch(PDO::FETCH_ASSOC);
    $image_url = $image['image_url'];

    if ($image_url === null) {
        return '/uploads/placeholder.jpeg';
    }

    return '/uploads/' . $image_url;
}

function fetch_search_results(PDO $database)
{
    $user_id = $_SESSION['user']['id'];
    if (isset($_POST['search'])) {
        $trimmed_search = trim($_POST['search']);
        //the following string is to fix a bug where if you place < > on either side of the search term, all the users tasks are returned. I fixed this by removing them from the start and end of the string.
        $remove_left_tag = ltrim($trimmed_search, '<');
        $remove_right_tag = rtrim($remove_left_tag, '>');
        $sanitized_search = filter_var($remove_right_tag, FILTER_SANITIZE_STRING);
        $search = "%" . ($sanitized_search) . "%";
        $statement = $database->prepare(
            "SELECT tasks.id, tasks.deadline_at, tasks.list_id, tasks.user_id, tasks.completed_at, tasks.title, tasks.content, lists.title
            AS list_title
            FROM tasks
            INNER JOIN lists
            ON tasks.list_id = lists.id
            WHERE tasks.user_id = :user_id
            AND (tasks.title
            LIKE :search
            OR content
            LIKE :search
            OR list_title
            LIKE :search)"
        );

        $statement->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $statement->bindParam(':search', $search, PDO::PARAM_STR);
        $statement->execute();
        $search_result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $search_result;
    }
}
