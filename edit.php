<!DOCTYPE html PUBLIC'-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml'>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta http-equiv="Content-Language" content="zh-CN"/>
    <meta name='keywords' content='语录——后台管理'>
    <link rel="stylesheet" href="style.css">
    <title>编辑词条</title></head>
<?php
require_once('config.php');
if (isset($_COOKIE['admin'])) {
    $id = @$_GET['id'];
    if ($id == false) {
        echo '<div class=\'error\'>ERROR  未传入id</div>';
        die();
    }
    try {
        $connect = new PDO($dsn,$mysql_username,$mysql_password);
        $sql = "SELECT *  FROM word WHERE id = $id";
        $query = $connect->query($sql);
        $query->setFetchMode(PDO::FETCH_ASSOC);
        $edit = $query->fetch();
        if ($query) {
            switch ($edit['kind']) {
                case 0:
                    $kind = '<select name="kind" class = \'input\'> 
    <option value="0" selected>动漫语录</option> 
    <option value="1">哲理语录</option>
    <option value="2">名人名言</option>
    <option value="3">优美诗词</option> 
    </select>';
                    break;
                case 1:
                    $kind = '<select name="kind" class = \'input\'> 
    <option value="0">动漫语录</option> 
    <option value="1" selected>哲理语录</option>
    <option value="2">名人名言</option>
    <option value="3">优美诗词</option> 
    </select>';
                    break;
                case 2:
                    $kind = '<select name="kind" class = \'input\'> 
    <option value="0">动漫语录</option> 
    <option value="1">哲理语录</option>
    <option value="2" selected>名人名言</option>
    <option value="3">优美诗词</option> 
    </select>';
                    break;
                case 3:
                    $kind = '<select name="kind" class = \'input\'> 
    <option value="0">动漫语录</option> 
    <option value="1">哲理语录</option>
    <option value="2">名人名言</option>
    <option value="3" selected>优美诗词</option> 
    </select>';
                    break;
                default:
                    $kind = '<select name="kind" class = \'input\'> 
    <option value="0">动漫语录</option> 
    <option value="1">哲理语录</option>
    <option value="2">名人名言</option>
    <option value="3">优美诗词</option> 
    </select>';
            }
            echo <<<html
<div class='menu shadow'>编辑器 - 语录</div>
<div class='list'><form action = 'update.php?id={$edit['id']}' method ='POST'>本句ID:{$edit['id']}<br />
语录:<textarea name ='txt' >{$edit['words']}</textarea><br />
分类:{$kind}<br />
审核:<select name="sh" class = 'input'> 
    <option value="0">拒绝</option> 
    <option value="1" selected>通过</option>
    </select><br />
<center> <input type ='submit' value="修改"/></center></form></div>
html;
        } else {
            echo '<font color = "red"/>ERROR!</font>  查询失败';
        }
    } catch (PDOException $e) {
        echo '数据库连接失败！<br />详细信息: ' . $e->getMessage();
    }
} else {
    echo '<div class = \'toper box\'>请登录后操作</div>';
}