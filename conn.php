

<?php
/*****************************
*数据库连接
*****************************/

$dbh = new PDO('mysql:host=localhost;dbname=test1', "root", "9027yj");


if (!$dbh){
	die("连接数据库失败：" . mysqli_error());
}
else{
   echo "连接数据库成功!";
}


?>





