<?php
    //session_start();
    $db_server = '127.0.0.1';
    $db_port = '3306';
    $db_name = 'demo';
    $db_user = 'root';
    $db_password = '200618';
    $dsn = "mysql:host=$db_server;port=$db_port;dbname=$db_name";

    $pdo = new PDO($dsn, $db_user, $db_password);
    $name = $_POST["username"];
    $pwd  = $_POST["password"];
    $power =0;
    $cfm  = $_POST["confirm"];

    if($name==''||$pwd==''||$cfm=='')
    {
        echo "<script>alert('请确认信息完整性！'); history.go(-1);</script>";
    }

    if($_POST["password"]!=$_POST["confirm"])
    {
        echo "<script>alert('两次填写的密码不一致！'); history.go(-1);</script>";
    }

    $chk  = $pdo->prepare("select * from user where username='$name'");
    $chk->execute();
    $res  = $chk->fetch();
    if($res)
    {
        echo "<script>alert('用户名已存在，请重新输入！'); history.go(-1);</script>";
    }
    else {
              $stmt = $pdo->prepare('insert into user(username,password,power) values(?,?,?)');
              $stmt->bindParam(1,$name);
              $stmt->bindParam(2,$pwd);
              $stmt->bindParam(3,$power);
              $stmt->execute();
              echo "<script>alert('注册成功！'); </script>";
              echo "<a href='login.php'>如果跳转失败请点击跳转~~</a>";
              header("Refresh:1;url=login.php");
          }


?>
