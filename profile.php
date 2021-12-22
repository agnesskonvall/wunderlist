<?php require __DIR__ . '/app/autoload.php'; ?>
<?php require __DIR__ . '/views/header.php'; ?>

<?php if (isset($_SESSION['errors'])) : ?>
    <?php foreach ($_SESSION['errors'] as $error) : ?>
        <div class="error">
            <?php echo $error; ?>
        </div>
    <?php endforeach; ?>
    <?php unset($_SESSION['errors']) ?>
<?php endif; ?>

<form action="app/users/update/email.php" method="post">

    <div class="mb-3">
        <label for="email">Email</label>
        <input class="form-control" type="email" name="email" id="email" placeholder="email" required>
        <small class="form-text">Update your registered email-adress.</small>
    </div>
    <button type="submit">Change email</button>

</form>
<form action="app/users/update/password.php" method="post">

    <div class="mb-3">
        <label for="password">Old password</label>
        <input class="form-control" type="password" name="password" id="password" required>
        <small class="form-text">Enter your current password.</small>
    </div>
    <div class="mb-3">
        <label for="new_password">New password</label>
        <input class="form-control" type="password" name="new_password" id="new_password" required>
        <small class="form-text">Update your password.</small>
    </div>
    <button type="submit">Change password</button>
</form>
<div class="mb-3" enctype="multipart/form-data">
    <form action="app/users/avatar/upload.php" method="post">

        <div>
            <label for="image">Choose profile picture</label>
            <input type="file" id="image" name="image" accept=".jpg, .jpeg, .png">
        </div>
        <button type="submit">Upload</button>

    </form>



    <?php require __DIR__ . '/views/footer.php'; ?>
