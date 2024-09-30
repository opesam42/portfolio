<?php
require('config.php');

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    // Check if the file is received from the frontend
    if( isset($_FILES['image']) ){
        header("Location: " .$config_basedir)
        $image = $_FILES['image']; // Set the variable name for the image
        $imagePath = 'uploads/' . basename($image['name']); // Set the image path
        error_log("Attempting to move uploaded file to $imagePath");

        // Move the uploaded file to the designated folder
        if (move_uploaded_file($image['tmp_name'], $imagePath)) {
            // Return image URL in JSON format to the frontend
            header('Content-Type: application/json');
            echo json_encode(['imageUrl' => $imagePath]);
        } else {
            // Handle the error in case the image upload fails
            echo json_encode(['error' => 'Failed to move uploaded file']);
        }
    } else {
        // Handle case where no file is uploaded
        error_log("No image recieved");
        echo json_encode(['error' => 'No image received']);
    }
}
?>