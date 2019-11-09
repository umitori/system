<?php
    //session_start();
    $db_server = '127.0.0.1';
    $db_port = '3306';
    $db_name = 'demo';
    $db_user = 'root';
    $db_password = '200618';
    $dsn = "mysql:host=$db_server;port=$db_port;dbname=$db_name";

    $pdo = new PDO($dsn, $db_user, $db_password);
    $act=$_GET['act'];
    $id=$_GET['id'];

    if($act=='up'){$pow=1;}
    else {$pow=0;}

    $chk  = $pdo->prepare("UPDATE user SET power = ? where id=?");
    $chk->bindParam(1,$pow);
    $chk->bindParam(2,$id);
    $chk->execute();

    echo "<script>alert('修改成功！'); history.go(-1);</script>";


?>
