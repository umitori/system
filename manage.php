<html>
	<head>
			<meta charset =" utf8" />
			<title>人力管理系统</title>
      <?php
          $db_server = '127.0.0.1';
          $db_port = '3306';
          $db_name = 'demo';
          $db_user = 'root';
          $db_password = '200618';
          $dsn = "mysql:host=$db_server;port=$db_port;dbname=$db_name";
          $pdo = new PDO($dsn, $db_user, $db_password);
          $row = $pdo->prepare("select * from user");
          $row->execute();
          $data = $row ->fetchAll(PDO::FETCH_ASSOC);
			?>
			<?php $i=1;foreach ($data as $man):?>
            <tr>
                <td><?php echo $i++;?></td>
                <td><?php echo $man['username'];?></td>
                <td>
                    <a href="index.php?id=<?php echo $man['id']?>">更新</a>
                    <a href="del.php?id=<?php echo $man['id']?>">删除</a>
										<a href="pow.php?act=up&id=<?php echo $man['id']?>">权限提升</a>
										<a href="pow.php?act=down&id=<?php echo $man['id']?>">权限下降</a>
										<br>
                </td>
            </tr>
      <?php endforeach;?>



<html>
