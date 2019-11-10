<head> <meta name="viewport" content="width=device-width, content="width=device-width,initial-scale=1" />
 <link rel="stylesheet" href="style.css" type="text/css" />
<title>随机语录提交</title>
 </head>
<?php
session_start();
header("Content-type:text/html;charset=utf-8");
error_reporting(0);
$words=$_POST['words'];
$kind=$_POST['kind'];
//print_r($_POST);
//语句
$yzm=$_POST['yzm'];
//验证码
date_default_timezone_set('PRC');
$time=date("Y-m-d H:i:s");


if(strlen($words) > 300){
   echo "<div class='num'>语句超过字数限制100字！</div>";
        die;
      } 
      if ($_SESSION['yzm'] != $yzm){
   echo "<div class='num'>ERROR!   验证码错误！</div>";
       die;
   } 


if (strlen($words) <= 15 || $_SESSION['words'] == $words){
       if(strlen($words) <= 15){
		echo '<div class=\'num\'>ERROR !  输入的字数少于5个字！</div>';
			die;
}else{

		echo '<div class=\'num\'>ERROR!  请勿重复提交！</div>';
			die;



}
	
}
$_SESSION['words'] = $words;   

   $pdo = new PDO('sqlite:words.sqlite');
   $sql = "INSERT INTO word (words,kind,sh)
VALUES('".$words."','".$kind."','0');";
   $return = $pdo->exec($sql);
   //echo $return,$sql;
if($return == true){
   echo "<div class='list'>提交成功，等待审核!</div>";
   }else{

   echo "<div class='error'>你提交的语句记录失败!</div>";
	   
   }