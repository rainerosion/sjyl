<?php
error_reporting(0);
header('Content-type:text/html; Charset=utf-8');
$kind = @$_GET['k'];
$color = @$_GET['c']?$_GET['c']:336633;	
$url =  getenv('HTTP_REFERER');
if($url){
preg_match('/(http|https):\/\/(.*)\//U',$url,$con);
$url = $con[2];
$total = file_get_contents('url.txt');
$search = strpos($total,$url);
if(!$search && $url == true){
file_put_contents('url.txt',"\r\n".$url,FILE_APPEND|LOCK_EX);
}
}
$pdo = new PDO('sqlite:words.sqlite');
/*
$sql = "select count(*) from word where sh=1;";
$search = $pdo->query($sql);
$count = $search->fetchAll();
*/
if($kind == true){
if (!is_numeric($kind)) {
       die('类别值必须为数字');
}
$sql = "SELECT * FROM word where sh=1 and kind =$kind ORDER BY RANDOM() LIMIT 1;";
}else {
$sql = "SELECT * FROM word where sh=1  ORDER BY RANDOM() LIMIT 1;";
	
}

$search = $pdo->query($sql);
$search->setFetchMode(PDO::FETCH_ASSOC);
$result = $search->fetchAll();	
//print_r($result);
if(count($result)== 0){
$con =  '暂无该类语录，期待你的添加！';
$state = 'error';
$_kind = '暂无分类';
}else{

$con =  $result[0]['words'];
$_kind = $result[0]['kind'];
$state = 'ok';	
}

if(@$_GET['act'] == 'js'){

echo <<<html
var dictaColor = '#{$color}';
var dictumin = '{$con}' ;
document.write('<font color="' + dictaColor + '">' + dictumin + '</font>');
html;
}elseif(@$_GET['act'] == 'api'){
	$find = array('0','1','2','3');
	$str = array('动漫语录','哲理语录','名人名言','优美诗词');
	$_kind = str_replace($find,$str,$_kind);
	$txt = urlencode($con);
	$_kind = urlencode($_kind);
 $arr = Array('txt'  => $txt,
              'kind' => $_kind,
              'state' => $state);
              echo urldecode(json_encode($arr));
	
}else{
	//暂无内容
}
?>