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
            <br>
            How about making a new list? Let's get this bread!
            <form action="app/lists/create.php" method="post">
                <div class="mb-3">
                    <label for="title"></label>
                    <input class="form-control" type="text" name="title" id="title" placeholder="Title" required>
                    <small class="form-text">Set a fancy title for your new list!</small>
                </div>
                <button class="submit" type="submit" class="btn btn-primary">Create list</button>
            </form>
        <?php endif ?>
        <br>
        <div class="completed">
            <p>Can you believe you completed <?= fetch_all_completed_tasks($database); ?> tasks already? You're doing amazing sweetie!</p>
        </div>
    </article>
<?php else : ?>
    <div>
        <p>This is for all you busy-bodies out there. Keep track of what you need to do and do it!</p>
    </div>
    <ul><b>to-do list</b>
        <li style="font-style: italic;">noun </li>
        <li>a list of tasks that need to be completed, typically organized in order of priority.</li>
    </ul>
<?php endif ?>
<br><br>

<button onclick="topFunction()" id="top" title="Go to top">Scroll to top</button>
<?php require __DIR__ . '/views/footer.php';
