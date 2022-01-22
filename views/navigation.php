<nav class="navbar navbar-expand-lg navbar-light bg-light d-flex">
    <a class="navbar-brand" href="#"><?php echo $config['title']; ?></a>

    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" href="/index.php">Home</a>
        </li>
        <?php if (logged_in()) : ?>
            <li class="nav-item">
                <a class="nav-link" href="/lists.php">Lists</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/tasks.php">Tasks</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/profile.php">Profile</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/app/users/logout.php">Logout</a>
            </li>

        <?php else : ?>
            <li class="nav-item">
                <a class="nav-link" href="/login.php">Login</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/register.php">Register</a>
            </li>
        <?php endif ?>

    </ul>
    <?php if (logged_in()) : ?>
        <div class="ml-auto">
            <form action="/searchresults.php" method="POST" class="width">
                <div class="input-group mb-3">

                    <input type="text" class="form-control" name="search" placeholder="Search for a List or Task" aria-label="Recipient's username" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                        <button class="btn-secondary" type="submit">Search</button>
                    </div>
                </div>
        </div>
        </form>
    <?php endif ?>
</nav>
