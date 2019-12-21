<?php 
session_start(); 
$id = $_SESSION["userID"];
$ds          = DIRECTORY_SEPARATOR;  
 
$storeFolder = '..'.$ds.'..'.$ds.'path/to/your/photos'.$ds.'draft'.$ds.$id;
if (!file_exists($storeFolder)) {
    $oldmask = umask(0);
    mkdir($storeFolder, 0777, true);
    umask($oldmask);
}
$extension  = '.png';
if (!empty($_FILES)) {
     
    $tempFile = $_FILES['file']['tmp_name'];    
    $targetPath = dirname( __FILE__ ) . $ds. $storeFolder . $ds;  
    // $targetFile =  $targetPath. $_FILES['file']['name'];  
    $targetFile =  $targetPath.'1'.$extension;  
 	if(!file_exists($targetPath.'1'.$extension)) {
 		$targetFile =  $targetPath.'1'.$extension; 
    }
    elseif(!file_exists($targetPath.'2'.$extension)) {
    	$targetFile =  $targetPath.'2'.$extension;
    }
    elseif(!file_exists($targetPath.'3'.$extension)) {
    	$targetFile =  $targetPath.'3'.$extension;
    }
    else{
    	unlink($targetPath.'1'.$extension);
    	unlink($targetPath.'2'.$extension);
    	unlink($targetPath.'3'.$extension);
    	$targetFile =  $targetPath.'1'.$extension;
    }

    move_uploaded_file($tempFile,$targetFile); 
     
}
?> 