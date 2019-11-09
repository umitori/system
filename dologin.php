<?php
    session_start();
    $db_server = '127.0.0.1';
    $db_port = '3306';
    $db_name = 'demo';
    $db_user = 'root';
    $db_password = '200618';
    $dsn = "mysql:host=$db_server;port=$db_port;dbname=$db_name";
    try {

          $pdo = new PDO($dsn, $db_user, $db_password);
          $name = $_POST["username"];
          $pwd  = $_POST["password"];
          if($name==''||$pwd=='')
          {
            echo "<script>alert('请确认信息完整性！'); history.go(-1);</script>";
          }
          $res=$pdo->prepare("select * from user where username='$name' and password='$pwd'");
          $res->execute();
          $row=$res->fetch();
          if($row)
          {
            $_SESSION['username']=$name;
            $_SESSION['password']=$pwd;
            $_SESSION['id']=$row['id'];
            $_SESSION['power']=$row['power'];
            echo "<script>alert('登陆成功！'); </script>";
            echo "<a href='home.php'>如果跳转失败请点击跳转~~</a>";
            header("Refresh:1;url=home.php");
          }
          else {
            echo "<script>alert('用户名或密码错误！'); history.go(-1);</script>";
          }
        }
        catch (PDOException $ex) {
        exit("不能连接数据库".$ex);
    }

?>
