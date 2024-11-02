<?php
// Define the directory where images are stored
$uploadDir = __DIR__ . '/uploads/'; // Adjust the path if necessary

// Define a temporary name for the ZIP file
$zipFileName = 'images.zip';

// Initialize a new ZipArchive instance
$zip = new ZipArchive();

// Create the ZIP file in memory
if ($zip->open($zipFileName, ZipArchive::CREATE | ZipArchive::OVERWRITE) !== TRUE) {
    exit("Cannot create ZIP file.");
}

// Check if the directory exists
if (is_dir($uploadDir)) {
    $files = scandir($uploadDir);

    // Filter and add only image files to the ZIP archive
    foreach ($files as $file) {
        $filePath = $uploadDir . $file;
        if (is_file($filePath) && preg_match('/\.(jpg|jpeg|png|gif)$/i', $file)) {
            $zip->addFile($filePath, $file); // Add file to ZIP with its original name
        }
    }

    // Close the ZIP file
    $zip->close();

    // Set headers to force download the ZIP file
    header('Content-Type: application/zip');
    header('Content-Disposition: attachment; filename="' . $zipFileName . '"');
    header('Content-Length: ' . filesize($zipFileName));

    // Output the ZIP file to the browser
    readfile($zipFileName);

    // Delete the temporary ZIP file from the server after download
    unlink($zipFileName);
} else {
    exit("The uploads directory does not exist.");
}
?>
