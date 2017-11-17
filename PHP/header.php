<?php
    error_reporting(E_ALL);ini_set('display_errors', 0);
    session_start();
    include('../path/to/dataBaseConnection.php');
    $pdo = dataBaseConnection::getConnection();
    if (!isset($_SESSION['CREATED'])) {
        $_SESSION['CREATED'] = time();
    } else if (time() - $_SESSION['CREATED'] > 1800) {
        // session started more than 30 minutes ago
        session_regenerate_id(true);    // change session ID for the current session an invalidate old session ID
        $_SESSION['CREATED'] = time();  // update creation time
    }
    //if the user has not logged in
    if(!(isset($_SESSION['valid']) && $_SESSION['valid'] ))
    {
        print "<meta http-equiv=\"refresh\" target=\"_blank\" content=\"0;URL=../users/login/index.php\">";
        die();
    }
    $id  = $_GET['user_id'] ?: $_SESSION["userID"];
    $defaultImage="../media/images/profile-pictures/default.jpg";
    $userImage = "../media/images/profile-pictures/".$id.".png";
    $userImage =  ((file_exists($userImage) == true)?$userImage:$defaultImage);
    // Retrieve the current URL
    $sublinks = explode("/", $_SERVER['REQUEST_URI']);
    $noOflinks = sizeof($sublinks);
    $domain = $sublinks[$noOflinks-2];
    $page = $sublinks[$noOflinks-1];
?>