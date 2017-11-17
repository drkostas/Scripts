<?php 
error_reporting(E_ALL);ini_set('display_errors', 0);
$basefolder = $_SERVER['DOCUMENT_ROOT']."/location/of/video/folder";
$dir = $basefolder . date("Y-m-d", strtotime("-1 week"));
// echo $dir;
$it = new RecursiveDirectoryIterator($dir, RecursiveDirectoryIterator::SKIP_DOTS);
$files = new RecursiveIteratorIterator($it,
             RecursiveIteratorIterator::CHILD_FIRST);
foreach($files as $file) {
    if ($file->isDir()){
        rmdir($file->getRealPath());
    } else {
        unlink($file->getRealPath());
    }
}
rmdir($dir);
?>