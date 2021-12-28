<?php
require __DIR__ . '/app/autoload.php';
require __DIR__ . '/views/header.php';
?>
<h3>Edit task</h3>
<form action="/app/tasks/update.php?id=<?= $id ?>" method="post">
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
