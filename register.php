<?php require __DIR__ . '/app/autoload.php'; ?>
<?php require __DIR__ . '/views/header.php'; ?>


<article>
    <h1>Register</h1>
    <?php if (isset($_SESSION['errors'])) : ?>
        <?php foreach ($_SESSION['errors'] as $error) : ?>
            <div class="error">
                <?php echo $error; ?>
            </div>
        <?php endforeach; ?>
        <?php unset($_SESSION['errors']) ?>
    <?php endif; ?>
    <form action="app/users/register.php" method="post">
        <div class="mb-3">
            <label for="username">Username</label>
            <input class="form-control" type="username" name="username" id="username" placeholder="username" required>
            <small class="form-text">Please provide your wanted username.</small>
        </div>
        <div class="mb-3">
            <label for="email">Email</label>
            <input class="form-control" type="email" name="email" id="email" placeholder="email" required>
            <small class="form-text">Please provide your email address.</small>
        </div>
        <div class="mb-3">
            <label for="password">Password</label>
            <input class="form-control" type="password" name="password" id="password" required>
            <small class="form-text">Please provide your wanted password (passphrase).</small>
        </div>
        <button type="submit" class="btn btn-primary">Register</button>
    </form>
</article>

<?php require __DIR__ . '/views/footer.php'; ?>
