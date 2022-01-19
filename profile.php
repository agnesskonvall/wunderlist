<?php require __DIR__ . '/app/autoload.php'; ?>
<?php require __DIR__ . '/views/header.php'; ?>
<div class="wrapper">
    <div class="form_wrapper">
        <a>Welcome to your profile, <?php echo welcome(); ?></a>

        <form action="app/users/update/email.php" method="post">

            <div class="mb-3">
                <label for="email">Email</label>
                <input class="form-control" type="email" name="email" id="email" placeholder="email" required>
                <small class="form-text">Update your registered email-adress.</small>
            </div>
            <button class="submit" type="submit">Change email</button>
            <br><br>
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
                <small class="form-text">Enter your new password.</small>
                <button class="submit" type="submit">Change password</button>
            </div>
        </form>
    </div>
    <div class="profile_wrapper">
        <?php $image_url = get_image_url($database); ?>
        <img class="profile_picture" src="<?= $image_url; ?>" alt="Profile picture">
        <form action="/app/users/avatar/upload.php" method="post" enctype="multipart/form-data">
            <label for="image">Upload your avatar image in PNG/JPG format</label>
            <input type="file" name="image" id="image" accept=".png, .jpg, .jpeg">
            <button class="submit" type="submit">Upload image</button>
        </form>
    </div>
</div>
<hr>
<form action="/app/users/update/deleteuser.php" method="post">

    <label for="delete_user">
        Delete account
    </label>

    <input class="form-control" type="password" name="delete_user" required>
    <label for="delete_user"><small class="form-text">Enter password to delete your account</small></label>
    <div><button class="btn-danger" type="submit" onclick="return confirm('Are you sure? Your account along with all your lists and tasks will be deleted forever. This cannot be undone.')">Delete my account</button>
</form>
</div>
<button onclick="topFunction()" id="top" title="Go to top">Scroll to top</button>


<?php require __DIR__ . '/views/footer.php'; ?>
