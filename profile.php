<?php require __DIR__ . '/app/autoload.php'; ?>
<?php require __DIR__ . '/views/header.php'; ?>

<div>
    <?php $image_url = get_image_url($database); ?>
    <img class="profile_picture" src="<?= $image_url; ?>" alt="Profile picture">
</div>


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
<br>
<div>Change your profile picture</div>
<form action="/app/users/avatar/upload.php" method="post" enctype="multipart/form-data">
    <label for="image">Upload your avatar image in PNG/JPG format</label>
    <input type="file" name="image" id="image" accept=".png, .jpg, .jpeg">
    <button class="submit" type="submit">Upload image</button>
</form>

<button onclick="topFunction()" id="top" title="Go to top">Scroll to top</button>


<?php require __DIR__ . '/views/footer.php'; ?>
