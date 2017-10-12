<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="application/xhtml+xml; charset=utf-8" />
<meta name="viewport" content="width=device-width, content="width=device-width,initial-scale=1" />
<link rel="stylesheet" href="style.css" type="text/css" />
<?php
$id = @$_GET['id'];
if(isset($_COOKIE['admin'])){
if ($id == false){
echo '<div class=\'error\'>未传入id</div>';
die();
}
}else{
	echo <<<html
	<div class='false box'>请登录后操作！</div>
html;
die();
}
//if ($act == 'edit'){
$words = @$_POST['txt'];
$kind = @$_POST['kind'];
$sh = @$_POST['sh'];

                          if ($words){
$words = str_replace("'","’",$words);
$db = 'sqlite:words.sqlite';
try{
$con = new PDO($db);

$sql_up ="UPDATE word SET words = '$words', sh = '$sh',kind = '$kind' WHERE id = $id";
$up_query = $con->query($sql_up);
               if($up_query){
               header("refresh:3;url=admin.php");
               echo '<div class=\'list\'>修改成功!</div>';
} else {
               header("refresh:3;url=admin.php");
               echo '<div class=\'error\'>修改失败';

}
}catch (PDOException $e){
echo '数据库连接失败！<br />详细信息: ' . $e->getMessage();
$db = null;
die();
}
}

