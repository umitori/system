<?php session_start();?>
<html>
	<head>
			<meta charset =" utf8" />
			<title>人力管理系统</title>
  </head>
  <?php
      $username=$_SESSION['username'];
    //  $id=$_SESSION['id'];
      echo "欢迎来到人力管理系统，亲爱的$username ~";
  ?>
  <br>
	<?php
			if($_SESSION['power'])
			{
				echo "<a href='manage.php' class='link'>人员管理</a><br>";
			}
	 ?>

  <a href="index.php" class="link">查看/修改个人信息</a>
<html>
