<?php
 
/* 
 * This script only works on linux.
 * It keeps only 31 backups of past 31 days, and backups of each 1st day of past months.
 */


define('DB_HOST', 'localhost');
define('DB_NAME', 'dbName');
define('DB_USER', 'dbUser');
define('DB_PASSWORD', 'dbPassword');
define('BACKUP_SAVE_TO', 'DB_Backup'); // without trailing slash

error_reporting(E_ALL);
ini_set('display_errors', 1);

$time = time();
$day = date('j', $time);
if ($day == 1) {
    $date = date('Y-m-d', $time);
} else {
    $date = $day;
}
 
$backupFile = BACKUP_SAVE_TO . '/' . DB_NAME . '_' . $date . '.gz';
if (file_exists($backupFile)) {
    unlink($backupFile);
}
$command = 'mysqldump --opt -h ' . DB_HOST . ' -u ' . DB_USER . ' -p \'' . DB_PASSWORD . '\' ' . DB_NAME . ' | gzip > ' . $backupFile;
var_dump(system($command));
 echo $command;
?>