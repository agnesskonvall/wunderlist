<?php require __DIR__ . '/app/autoload.php'; ?>
<?php require __DIR__ . '/views/header.php'; ?>
<?php


/* upload new image*/
?>
<form action="app/users/avatar/upload.php" method="post" enctype="multipart/form-data">
    <div>
        <label for="image">Choose an image to upload</label>
        <input type="file" name="image" id="image" accept=".jpg, .jpeg, .png" required>
    </div>

    <button type="submit">Upload</button>

    <?php require __DIR__ . '/views/footer.php'; ?>
