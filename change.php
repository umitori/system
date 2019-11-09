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
          $username = $_POST["username"];
          $pwd  = $_POST["password"];
          $name = $_POST["name"];
          $birthday = $_POST["birthday"];
          $sex = $_POST["sex"];
          $info = $_POST["info"];

          $id=$_SESSION["id"];
          $res=$pdo->prepare("select * from info where id='$id'");
          $res->execute();
          $ret=$res->fetch();

          $chk  = $pdo->prepare("UPDATE user SET username = ?, password = ? where id=?");
          $chk->bindParam(1,$username);
          $chk->bindParam(2,$pwd);
          $chk->bindParam(3,$id);
          $chk->execute();
          if($ret)
          {
              $row = $pdo->prepare("UPDATE info SET name = ?, birthday = ?, sex=?, info=? where id=?");
              $row->bindParam(1,$name);
              $row->bindParam(2,$birthday);
              $row->bindParam(3,$sex);
              $row->bindParam(4,$info);
              $row->bindParam(5,$id);
              $row->execute();
          }
          else
          {

              $row = $pdo->prepare("INSERT into info(name,birthday,sex,info,id) values(?,?,?,?,?)");
              $row->bindParam(1,$name);
              $row->bindParam(2,$birthday);
              $row->bindParam(3,$sex);
              $row->bindParam(4,$info);
              $row->bindParam(5,$id);
              $row->execute();
          }


          echo "<script>alert('修改完成！'); history.go(-1);</script>";

        }
        catch (PDOException $ex) {
        exit("不能连接数据库".$ex);
    }

?>
