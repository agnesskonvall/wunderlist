<?php require __DIR__ . '/app/autoload.php'; ?>
<?php require __DIR__ . '/views/header.php'; ?>
<?php $user_id = $_SESSION['user']['id']; ?>


<article>
    <h1><?php echo $config['title']; ?></h1>
    <p>Welcome to agenda. This is your to do-list for today.</p>
    <ul>
        <?php
        $current_tasks = fetch_all_current_tasks($database); ?>
        <?php if ($current_tasks) : ?>
            <h4>Due today - <?= date('Y-m-d') ?></h4>
            <?php foreach ($current_tasks as $task) : ?>
                <li>
                    <h6> <?= $task['title'] ?> </h6>
                    <a> <?= $task['content'] ?> </a>
                    <button>
                        <a href="/individual_task.php?id=<?= $task['id']; ?>">Update </a>
                    </button>
                </li>
            <?php endforeach ?>
        <?php else : ?>
            <h3>Looks like you have the day off!</h3>
        <?php endif ?>
    </ul>
</article>

<?php require __DIR__ . '/views/footer.php';
