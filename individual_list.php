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

<form action="/app/lists/update.php?id=<?php $_GET['id'] ?>" method="post">
    <div class="mb-3">
        <label for="title">Update list-name</label>
        <input class="form-control" type="text" name="title" id="title" placeholder="title" required>
        <small class="form-text">Update the name for your list.</small>
    </div>
    <button type="submit">Change title</button>

</form>

<?php require __DIR__ . '/views/footer.php'; ?>
