<?php require __DIR__ . '/app/autoload.php'; ?>
<?php require __DIR__ . '/views/header.php'; ?>

<form action="/app/tasks/delete.php" method="post">
    <button name="id" type="submit" value="324">Delete</button>
</form>

<?php require __DIR__ . '/views/footer.php'; ?>
