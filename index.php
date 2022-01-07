<?php require __DIR__ . '/app/autoload.php'; ?>
<?php require __DIR__ . '/views/header.php'; ?>

<h1><?php echo $config['title']; ?></h1>
<?php if (logged_in()) : ?>
    <article>
        <p>Welcome to agenda. This is your to do-list for today.</p>
        <?php $current_tasks = fetch_all_current_tasks($database); ?>
        <?php if ($current_tasks) : ?>
            <h4>Due today - <?= date('Y-m-d') ?></h4>
            <?php foreach ($current_tasks as $task) : ?>
                <ul>
                    <li>
                        <h6> <?= $task['title'] ?> </h6>
                        <a> <?= $task['content'] ?> </a>
                        <button class="update">
                            <a href="/individual_task.php?id=<?= $task['id']; ?>">Update </a>
                        </button>
                    </li>
                <?php endforeach ?>
                </ul>
            <?php else : ?>
                <h3>Looks like you have the day off!</h3>
            <?php endif ?>
        <?php else : ?>
            <div>
                <p>This is for all you busy-bodies out there. Keep track of what you need to do and do it!</p>
            </div>
        <?php endif ?>
    </article>

    <?php require __DIR__ . '/views/footer.php';
