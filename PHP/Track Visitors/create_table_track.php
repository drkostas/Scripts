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

    $crt_tbl = $pdo->prepare("CREATE TABLE tracking_info(
                            `id` int(6) NOT NULL auto_increment,
                            `tm` varchar(20) NOT NULL default '',
                            `ref` varchar(250) NOT NULL default '',
                            `agent` varchar(250) NOT NULL default '',
                            `ip` varchar(20) NOT NULL default '',
                            `ip_value` int(11) NOT NULL default '0',
                            `domain` varchar(20) NOT NULL default '',
                            `tracking_page_name` varchar(20) NOT NULL default '',
                             UNIQUE KEY `id` (`id`)
                             ) ENGINE=MyISAM DEFAULT CHARSET=latin1 ");

  $crt_tbl->execute();

    if (!$crt_tbl) {
      echo "\nPDO::errorInfo():\n";
      print_r($pdo->errorInfo());
    }

?>