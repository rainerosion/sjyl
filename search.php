<?php
error_reporting(0);
?>
<!DOCTYPE html PUBLIC'-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml'>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta http-equiv="Content-Language" content="zh-CN"/>
    <meta name='keywords' content='在线,工具,音乐'>
    <link rel="stylesheet" href="style.css">
    <title>语录</title>
</head>
<body>
<?php
require_once('config.php');
$find = @$_GET['key'];
if ($find == '' || $find == false) {
    echo '<div class = \'error\'>ERROR 请先输入查询内容！</div>';
    die();
}
$pdo = new PDO($dsn,$mysql_username,$mysql_password);
$sql = "select * from word where words like '%" . $find . "%';";
$search = $pdo->query($sql);
$search->setFetchMode(PDO::FETCH_ASSOC);
$list = $search->fetchAll();
$number = count($list);


//print_r($list);
if ($number <= 0) {
    echo "<div class = 'error'>ERROR  数据库无[<font color='#AF4FD7'>{$find}</font>]相关的语录 </div>";
    exit;
} else {

    if (isset($find)) {
        echo '<div class = "menu shadow">询结到' . $number . '条数据</div>';

    }
    for ($n = 0; $n < $number; $n++) {
        $c = $n + 1;
        echo "<div class ='search'><font color=\"#ff9966\">{$c}</font>、{$list[$n]['words']}</div>";
    }
}


?>
</body>
</html>