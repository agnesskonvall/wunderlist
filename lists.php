<?php require __DIR__ . '/app/autoload.php'; ?>
<?php require __DIR__ . '/views/header.php'; ?>

<article>
    <h1>Your lists</h1>
    <?php $lists = fetch_lists($database); ?>
    <ul>
        <?php
        $lists = fetch_lists($database);
        foreach ($lists as $list) : ?>
            <li>
                <?= $list['title'] ?>
                <button>
                    <a href="/individual_list.php?id=<?= $list['id']; ?>">Update </a>
                </button>
                <button>
                    <a href="/app/lists/delete.php?id=<?= $list['id']; ?>">Delete </a>
                </button>
            </li>
        <?php endforeach ?>
    </ul>
    <h2>Create new list</h2>
    <form action="app/lists/create.php" method="post">
        <div class="mb-3">
            <label for="title">Title</label>
            <input class="form-control" type="text" name="title" id="title" placeholder="Title" required>
            <small class="form-text">Set a fancy title for your new list!</small>
        </div>
        <button type="submit" class="btn btn-primary">Create list</button>
    </form>
</article>
