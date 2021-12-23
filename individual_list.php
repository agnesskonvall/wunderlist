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

<?php require __DIR__ . '/views/footer.php'; ?>
