<?php require __DIR__ . '/app/autoload.php'; ?>
<?php require __DIR__ . '/views/header.php'; ?>

<article>
    <h1>Your uncompleted tasks</h1>
    <ul>
        <?php
        $tasks = fetch_all_uncompleted_tasks($database);
        foreach ($tasks as $task) : ?>
            <?php if ($_SESSION['user']['id']) : ?>
                <li>
                    <h6> <?= $task['title'] ?> </h6>
                    <p>Description: <?= $task['content'] ?> <br>
                        Deadline: <?= $task['deadline_at']; ?> </p>
                    <button class="update taskbutton">
                        <a href="/individual_task.php?id=<?= $task['id']; ?>">Update</a>
                    </button>
                    <br>
                    <br>
                </li>
            <?php endif ?>
        <?php endforeach ?>
    </ul>
    <button onclick="topFunction()" id="top" title="Go to top">Scroll to top</button>

    <?php require __DIR__ . '/views/footer.php';
