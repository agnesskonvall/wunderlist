<?php
require __DIR__ . '/app/autoload.php';
require __DIR__ . '/views/header.php';

$search_results = fetch_search_results($database); ?>

<article>
    <h1>Search result<h1>
            <h2>uncompleted tasks containting: <?= htmlspecialchars($_POST['search']) ?></h2>
            <ul>
                <?php
                foreach ($search_results as $task) : ?>
                    <?php if ($_SESSION['user']['id']) : ?>
                        <li>
                            <h6> <?= $task['title'] ?> </h6>
                            <p>Description: <?= $task['content'] ?> <br>
                                Deadline: <?= $task['deadline_at']; ?> <br>
                                List: <?= $task['list_title']; ?></p>
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

            <?php
            require __DIR__ . '/views/footer.php';
