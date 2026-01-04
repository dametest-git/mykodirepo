<?php
// Print only the DOCTYPE and one anchor per .zip file (no extra HTML structure)
echo "<!DOCTYPE html>\n";

$files = glob("*.zip");
if ($files === false) {
    // nothing to list (or glob error) — still only DOCTYPE will have been printed
    exit;
}

// natural case-insensitive sort
natcasesort($files);

// output one link per file in the exact format requested
foreach ($files as $file) {
    $escaped = htmlspecialchars($file, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
    echo '<a href="' . $escaped . '">' . $escaped . '</a>' . "\n";
}
?>