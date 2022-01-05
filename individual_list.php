<?php
require __DIR__ . '/app/autoload.php';
require __DIR__ . '/views/header.php';
?>

<?php
$id = $_GET['id'];
$user_id = $_SESSION['user']['id'];
$lists = fetch_lists($database);
$tasks = fetch_tasks($database);

foreach ($lists as $list) :
    if ($list['id'] === $id) : ?>
        <h2> <?= $list['title']; ?> </h2>
        <button class="delete">
            <a href="/app/lists/delete.php?id=<?= $list['id']; ?>">Delete </a>
        </button>
    <?php endif ?>
<?php endforeach ?>

<?php foreach ($tasks as $task) :
    if ($user_id && $list_id = $id) : ?>
        <h5> <?= $task['title']; ?> </h5>
        <h6>Deadline: <?= $task['deadline_at']; ?> </h6>
        <button class="delete">
            <a href="/app/tasks/delete.php?id=<?= $task['id']; ?>">Delete </a>
        </button>
        <button class="update">
            <a href="/individual_task.php?id=<?= $task['id']; ?>">Update </a>
        </button>
    <?php endif ?>
<?php endforeach ?>

<form action="/app/lists/update.php?id=<?= $id ?>" method="post">
    <div class="mb-3">
        <label for="title"></label>
        <input class="form-control" type="text" name="title" id="title" placeholder="New title" required>
        <small class="form-text">Update the name for your list.</small>
    </div>
    <button type="submit">Change title</button>

</form>
<br> <br>
<h3>Add task</h3>
<form action="/app/tasks/store.php?id=<?= $id ?>" method="post">
    <div class="mb-3">
        <label for="title"></label>
        <input class="form-control" type="text" name="title" id="title" maxlength="20" placeholder="Title" required>
        <small class="form-text">Add a title for your task.</small>
    </div>
    <div class="mb-3">
        <label for="content"></label>
        <input class="form-control" type="text" name="content" id="content" maxlength="255" placeholder="Description" required>
        <small class="form-text">Add a description for your task.</small>
    </div>
    <div class="mb-3">
        <label for="deadline"></label>
        <input type="date" name="deadline" id="deadline" placeholder="Deadline" required>
        <small class="form-text">Add a deadline for your task.</small>
    </div>

    <button type="submit">Add task</button>

</form>



<?php require __DIR__ . '/views/footer.php'; ?>
