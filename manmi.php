<?php header('Content-type: text/cache-manifest'); ?>CACHE MANIFEST

<?php

$page_file_temp = $_SERVER["PHP_SELF"];
$page_directory = dirname($_SERVER['DOCUMENT_ROOT']."/drishti/m/src/drishti.js");
$directory = $page_directory;

if ( ! is_dir($directory)) {
    exit('Invalid diretory path');
}

$files = array();

foreach (scandir($directory) as $file) {
    if ('.' === $file) continue;
    if ('..' === $file) continue;

    echo "src/";echo $file;
    echo "\n";
}
$page_directory = dirname($_SERVER['DOCUMENT_ROOT']."/drishti/m/css/style.css");
$directory = $page_directory;

if ( ! is_dir($directory)) {
    exit('Invalid diretory path');
}

$files = array();

foreach (scandir($directory) as $file) {
    if ('.' === $file) continue;
    if ('..' === $file) continue;

    echo "css/";echo $file;
    echo "\n";
}



?>NETWORK:
/images