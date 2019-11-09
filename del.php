<?php
    //session_start();
    $db_server = '127.0.0.1';
    $db_port = '3306';
    $db_name = 'demo';
    $db_user = 'root';
    $db_password = '200618';
    $dsn = "mysql:host=$db_server;port=$db_port;dbname=$db_name";

    $pdo = new PDO($dsn, $db_user, $db_password);

  /*  $id=$GET['id'];
    $chk  = $pdo->prepare("DELETE from user where id='$id'");
    $chk->execute();*/
    echo "<script>alert('删除成功！'); history.go(-1);</script>";


?>
