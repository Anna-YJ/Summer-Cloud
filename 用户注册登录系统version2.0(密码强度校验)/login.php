

<?php
session_start();


//登录
if(!isset($_POST['submit'])){
	exit('非法访问!');
}
$username = htmlspecialchars($_POST['username']);
$password = MD5($_POST['password']);


//包含数据库连接文件
include('conn.php');
//检测用户名及密码是否正确
$check_query = mysqli_query($conn,"select uid from user where username='$username' and password='$password' limit 1");
if($result = mysqli_fetch_array($check_query)){
	//登录成功
	$_SESSION['username'] = $username;
	$_SESSION['userid'] = $result['uid'];
        echo $username,'   欢迎你 !';
	exit;
} else {
	exit('登录失败！点击此处 <a href="javascript:history.back(-1);">返回</a> 重试');
}
?>




