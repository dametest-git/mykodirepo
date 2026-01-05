<?php
// index.php - lists all .zip files in the current directory
header('Content-Type: text/html; charset=utf-8');

// Print DOCTYPE exactly as requested
echo '<!DOCTYPE html>';

// Collect .zip files (case-insensitive)
$files = [];
foreach (new DirectoryIterator(__DIR__) as $file) {
    if ($file->isFile()) {
        $ext = strtolower(pathinfo($file->getFilename(), PATHINFO_EXTENSION));
        if ($ext === 'zip') {
            $files[] = $file->getFilename();
        }
    }
}

// Sort naturally, case-insensitive
if ($files) {
    usort($files, 'strnatcasecmp');
    foreach ($files as $name) {
        // href should be URL-encoded, display escaped
        $href = rawurlencode($name);
        $display = htmlspecialchars($name, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
        echo '<a href="' . $href . '">' . $display . '</a><BR>';
    }
}