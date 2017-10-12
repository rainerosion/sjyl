<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="application/xhtml+xml; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

<link rel="stylesheet" href="style.css" type="text/css" />
<?php
error_reporting(0);
include('config.php');
$act = @$_GET['act'];
//密码
if ($act == 'login_out'){
setcookie("admin", "");
echo '<div class ="footer">注销成功,3秒后跳转！</div>';
 header("refresh:3;url=index.php");

die();

}
if (isset($_COOKIE['admin'])){
	 header("refresh:3;url=admin.php");
echo <<<html
<title>已登录</title>
<div class ="footer">检测到你已经登录,3秒后跳转!</div>

html;
die();
 }else{
if(@$_POST['submit'] != '登录' or @$_POST['user'] == false){
echo <<<html
<title>管理员登录 - 语录</title>
</head>
<body><div class='menu'>管理员登录</div><div class='list'><form action ='?act=login' method ='POST'>
密码:<input type ='password' name ='pwd' value =''/><br /><center><input type ='submit' name = 'submit' value = '登录'/></center></form></div></body>

html;


}
}
if ($act == 'login'){
$pwd = @$_POST['pwd'];



if($pwd){
               if($pwd == $password){
               	$pwd = md5($pwd);
             	 @header("refresh:3;url=admin.php");
setcookie("admin","$pwd",time()+3600*24*30);
echo ' <div class ="footer"> 登录成功,3秒后跳转！</div>';
// header("refresh:3;url=admin.php");
}else{
echo ' <div class ="footer"> 帐号或密码错误!</div>';
}
}


}