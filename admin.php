<!DOCTYPE html PUBLIC'-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml'>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta http-equiv="Content-Language" content="zh-CN"/>
    <meta name='keywords' content='在线,工具,音乐'>
    <link rel="stylesheet" href="style.css">
    <title>语录 - 管理员后台</title>
</head>
<script>
    function del() {
        if (!confirm("确认要删除？")) {
            window.event.returnValue = false;
        }
    }

    function edit() {
        if (!confirm("确认要编辑？")) {
            window.event.returnValue = false;
        }
    }
</script>
<body><?php
require_once('config.php');
if (@$_COOKIE['admin'] == false) {
    echo <<<html
</head>
请登录，3秒后跳转！
html;
    header("refresh:3;url=login.php");
    die();
}
if (@$_COOKIE['admin'] != md5($password)) {
    echo <<<html
     </head>已登录但密码错误，3秒后为你注销！
html;
    header("refresh:3;url=login.php?act=login_out");
    die();
}
$pdo = new PDO($dsn, $mysql_username, $mysql_password);
if (@$_GET['act'] == 'tong') {
    $id = $_GET['id'];
    $sql = "UPDATE word SET sh =1 WHERE id = '$id';";
    $exec = $pdo->exec($sql);
    if ($exec == 1) {
        echo '<div class = "list">ID为' . $id . '语句通过审核</div>';
    } else {
        echo '<div class = "error">ID为' . $id . '语句出现未知错误</div>';
    }
}

if (@$_GET['act'] == 'del') {
    $id = $_GET['id'];
    $sql = "DELETE FROM word WHERE id = '$id'";
    $exec = $pdo->exec($sql);
    if ($exec == 1) {
        echo '<div class = "list">ID为' . $id . '语句已删除</div>';
    } else {
        echo '<div class = "error">ID为' . $id . '语句无法删除</div>';
    }
}

$sql = "select id,words,kind from word where sh=0;";
$search = $pdo->query($sql);
$search->setFetchMode(PDO::FETCH_ASSOC);
$list = $search->fetchAll();
$count = count($list);
if ($count > 0) {
    echo '<div class = "menu shadow">有' . $count . '条待审核语录<n><a href = \'login.php?act=login_out\'>注销</a></n></div>';
    for ($n = 0; $n < $count; $n++) {
        $c = $n + 1;
        $id = $list[$n]['id'];
        $_kind = $list[$n]['kind'];
        $find = array('0', '1', '2', '3');
        $str = array('动漫', '哲理', '名言', '诗词');
        $kind = str_replace($find, $str, $_kind);
        echo "<div class ='search'><font color=\"#ff9966\">{$c}</font>、【{$kind}】{$list[$n]['words']}<m><a href ='?act=tong&id={$id}' >过</a> <a href = 'edit.php?id={$id}' onClick='edit()'>改</a> <a href = '?act=del&id={$id}' onClick='del()'>删</a></m></div>";
    }
} else {
    echo '<div class = "menu shadow">没有待审核的语录 <n><a href = \'login.php?act=login_out\'>注销</a></n></div>';
}