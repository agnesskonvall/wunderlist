<?php
require __DIR__ . '/app/autoload.php';
require __DIR__ . '/views/header.php';
?>

<?php
$id = $_GET['id'];
$user_id = $_SESSION['user']['id'];
$lists = fetch_lists($database);

foreach ($lists as $list) :
    if ($list['id'] === $id) : ?>
        <h2> <?= $list['title']; ?> </h2>
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

<h3>Add task</h3>
<form action="/app/tasks/store.php?id=<?= $id ?>" method="post">
    <div class="mb-3">
        <label for="title"></label>
        <input class="form-control" type="text" name="title" id="title" maxlength="20" placeholder="Title" required>
        <small class="form-text">Add a title for your task.</small>
    </div>
    <div class="mb-3">
        <label for="description"></label>
        <input class="form-control" type="text" name="description" id="description" maxlength="255" placeholder="Description" required>
        <small class="form-text">Add a description for your task.</small>
    </div>
    <div class="mb-3">
        <label for="date"></label>
        <input class="form-control" type="date" name="date" id="date" maxlength="255" placeholder="Description" required>
        <small class="form-text">Add a deadline for your task.</small>
    </div>

    <button type="submit">Add task</button>

</form>



<?php require __DIR__ . '/views/footer.php'; ?>
