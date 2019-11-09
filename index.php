<?php session_start();?>
<html>
	<head>
			<meta charset =" utf8" />
			<title>人力管理系统</title>
  </head>
  <?php
			$db_server = '127.0.0.1';
			$db_port = '3306';
			$db_name = 'demo';
			$db_user = 'root';
			$db_password = '200618';
			$dsn = "mysql:host=$db_server;port=$db_port;dbname=$db_name";
			$pdo = new PDO($dsn, $db_user, $db_password);

			if(isset($_SESSION['id']))
			{
				$id=$_SESSION['id'];

			}
			else
			{
				$id=$_GET['id'];
			}
			$usr=$pdo->prepare("select * from user where id='$id'");
			$usr->execute();
			$inf=$usr->fetch();

			$username=$inf['username'];
			$pwd=$inf['password'];

			$res=$pdo->prepare("select * from info where id='$id'");
			$res->execute();
			$row=$res->fetch();

      $name=$row['name'];
      $birthday=$row['birthday'];
			$sex=$row['sex'];
      $info=$row['info'];

  ?>
      <form action="change.php" method="post">
        <dt>用户名：</dt><input type="text" name="username" value=<?php echo "$username";?> />
        <br >
        <dt>密码：</dt><input type="text" name="password" value=<?php echo "$pwd";?>  />
        <br >
        <dt>姓名：</dt><input type="text" name="name" value=<?php echo "$name";?>  />
        <br >
        <dt>生日：</dt><input type="text" name="birthday" value=<?php echo "$birthday";?>  />
        <br >
        <dt>性别：</dt><input type="text" name="sex" value=<?php echo "$sex";?>  />
        <br >
        <dt>个人介绍：</dt><input type="text" style="width:250px;height:100px" name="info" value=<?php echo "$info";?>  />
        <br >
        <input type="submit" name="submit" value="修改/提交" />
      </form>
<html>
