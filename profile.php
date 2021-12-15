<?php require __DIR__ . '/app/autoload.php'; ?>
<?php require __DIR__ . '/views/header.php'; ?>
<?php


/* upload new image*/
?>
<form action="app/users/register.php" method="post" enctype="multipart/form-data">
    <div>
        <label for="avatar">Choose a PNG image to upload</label>
        <input type="file" name="avatar" id="avatar" accept=".png/.jpg" required>
    </div>

    <button type="submit">Upload</button>

    <?php require __DIR__ . '/views/footer.php'; ?>
