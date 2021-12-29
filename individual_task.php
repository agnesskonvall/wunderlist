<?php
require __DIR__ . '/app/autoload.php';
require __DIR__ . '/views/header.php';
$task_id = $_GET['id'];

?>
<h3>Edit task</h3>
<form action="/app/tasks/update.php?id=<?= $task_id ?>" method="post">
    <div class="mb-3">
        <label for="title"></label>
        <input class="form-control" type="text" name="title" id="title" maxlength="20" placeholder="Title">
        <small class="form-text">Update the title for your task.</small>
    </div>
    <div class="mb-3">
        <label for="content"></label>
        <input class="form-control" type="text" name="content" id="content" maxlength="255" placeholder="Description">
        <small class="form-text">Update the description for your task.</small>
    </div>
    <div class="mb-3">
        <label for="deadline"></label>
        <input type="date" name="deadline" id="deadline" placeholder="Deadline">
        <small class="form-text">Update the deadline for your task.</small>
    </div>
    <input type="checkbox" id="completed_at" name="completed_at" value="completed_at">
    <label for="completed_at">Complete task</label>

    <button type="submit" class="btn btn-primary">Update task</button>

</form>
<?php require __DIR__ . '/views/footer.php'; ?>
