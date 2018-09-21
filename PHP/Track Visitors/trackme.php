<?php

    // Connect to db
    $server = 'mysql:dbname=your_db;host=your_server';
    $user = 'your_username';
    $password = 'your_password';
    try 
    {
        $pdo = new PDO($server, $user, $password);
    } 
    catch (PDOException $e) 
    {
        echo 'Connection failed: ' . $e->getMessage();
    }

    // Info about the visitor
    $tracking_page_name="the_name_of_your_page";
    if(isset($_SERVER['HTTP_REFERER'])) 
    {
      $ref=$_SERVER['HTTP_REFERER'];
    }
    else
    {
      $ref= "Unknown";
    }
    $agent=$_SERVER['HTTP_USER_AGENT'];
    $ip=$_SERVER['REMOTE_ADDR'];
    $domain = gethostbyaddr($_SERVER['REMOTE_ADDR']);
    $vstr = $pdo->prepare("INSERT INTO tracking_info(tm, ref, agent, ip, tracking_page_name, domain)  VALUES(curdate(), :ref, :agent, :ip, :tracking_page_name, :domain)");
    $vstr->execute(array(':ref'=>$ref, ':agent'=>$agent, ':ip'=>$ip, ':tracking_page_name'=>$tracking_page_name, ':domain'=>$domain));

    if (!$vstr) {
      echo "\nPDO::errorInfo():\n";
      print_r($pdo->errorInfo());
    }

?>