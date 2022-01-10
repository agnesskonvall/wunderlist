<?php require __DIR__ . '/app/autoload.php'; ?>
<?php require __DIR__ . '/views/header.php'; ?>

<h1><?php echo $config['title']; ?></h1>
<?php if (logged_in()) : ?>
    <article>
        <p>Welcome to agenda. This is your to do-list for today.</p>
        <?php $current_tasks = fetch_all_current_tasks($database); ?>
        <?php if ($current_tasks) : ?>
            <h4>Due today - <?= date('Y-m-d') ?></h4>
            <ul>
                <?php foreach ($current_tasks as $task) : ?>
                    <li>
                        <h5> <?= $task['title'] ?> </h5><br>
                        <a> Description: <?= $task['content'] ?> </a> <br>
                        <button class="update">
                            <a href="/individual_task.php?id=<?= $task['id']; ?>">Update task</a>
                        </button>
                    </li>
                <?php endforeach ?>
            </ul>
        <?php else : ?>
            <h3>Looks like you have the day off!</h3>
        <?php endif ?>
    </article>
<?php else : ?>
    <div>
        <p>This is for all you busy-bodies out there. Keep track of what you need to do and do it!</p>
    </div>
<?php endif ?>
<br><br>
<div class="completed">
    <p>Can you believe you completed <?= fetch_all_completed_tasks($database); ?> tasks already? You're doing amazing sweetie!</p>
</div>

<?php require __DIR__ . '/views/footer.php';
