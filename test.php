<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $image = $_FILES['image']['name'];
    $target = 'uploads/' . basename($image);

    if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
        echo "Image uploaded successfully!";
    } else {
        echo "Image upload failed!";
    }
}
?>

<form action="" method="POST" enctype="multipart/form-data">
    <input type="file" name="image">
    <button type="submit">Upload</button>
</form>