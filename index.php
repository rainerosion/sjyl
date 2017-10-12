<!DOCTYPE html PUBLIC'-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml'>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<meta http-equiv="Content-Language" content="zh-CN" />
<meta name='keywords' content='在线,工具,音乐'>
<link rel="stylesheet" href="style.css">
<title>语录</title>
</head>
<body>
	<script language="javascript">
function refresh() { 
var img = document.getElementById("checkCodeImg"); 
now = new Date(); 
img.src = "code.php?code="+now.getTime(); 
} 
</script>
    <form action = 'save.php' method = 'POST' />
    <!--
<input type = 'text' name = 'txt' placeholder = '输入内容'/>
-->
    <div class = "explan">
    <div class = "menu shadow">请输入语录</div>
    <div class = "list"><font color="red">输入语录请严格按照以下显示的语录格式输入.</font></div>
    <div class = "explan"><script type="text/JavaScript" src="./view.php?act=js&c=00cc99"></script>
</div>
    <textarea name = 'words' style='width:98%;height:70px;' placeholder = '输入语录'></textarea>
    <br/>
    <select name="kind" class = 'input'> 
    <option value="0">动漫语录</option> 
    <option value="1">哲理语录</option>
    <option value="2">名人名言</option>
    <option value="3">优美诗词</option> 
    </select> 
    <input type="text" name="yzm" value="" placeholder = '输入验证码' class="input" />
    <img  src='code.php' id="checkCodeImg" > 
<input type='button' href="#" onclick="javascript:refresh();" value ='换一张?'>
 
    <center>
    <input type="reset" value="重置" />  <input type = 'submit' value = '提交'/>
    </center>
    </form>

     <form action = 'search.php' method = 'GET' />
     </div>
     <div class = "explan mar">
     <div class = "menu shadow">语录查询</div>
     <input type = 'text' name = 'key' placeholder = '查询你提交的语录是否存在' class = 'inp'/>
     <center>
     <input type="reset" value="重置" />  <input type = 'submit' value = '查询'/>
     </center>
     </form>
     </div>
     <br /><div class ="list">
     <table width="100%" border="2px" bordercolor = "0x4C96FF">
<tr>
<td colspan="4" align="center"><b>语录调用代码</b></td> 
</tr>
<tr>
<th align="center">JS</td> 
<td colspan="3">&lt;script type="text/JavaScript" src="http://<?php echo $_SERVER['HTTP_HOST']; ?>/sjyl/view.php?act=js"&gt;&lt;/script&gt;</td>
</tr>
<tr>
<th align="center">API</td> 
<td colspan="3">http://<?php echo $_SERVER['HTTP_HOST']; ?>/sjyl/view.php?act=api</td>
</tr>
<tr>
<td colspan="4" align="center"><b>可选参数</b></td> 
</tr>
<tr>
<th align="center">参数</td> 
<th align="center">功能</td>
<th align="center">值</td> <td align="center"><b>参数说明</b></td>
</tr>
<tr>
<td>c</td> 
<td align="center">颜色</td>
<td align="center">16进制</td>
<td><font color = 'red'>[仅JS调用有效 颜色代码不加符号#]</font> <font color = '#fa8c35'>fa8c35</font>,<font color = '#4b5cc4'>4b5cc4</font>,<font color = '#801dae'>801dae</font>,<font color = '#44cef6'>44cef6</font></td> 
</tr>
<tr>
<td>k</td> 
<td align="center">类别</td>
<td align="center">0,1,2,3</td>
<td>0=动漫,1=哲理,2=名言,3=诗句</td> 
</tr>
<tr>
<th align="center">例子</td> 
<td colspan="3">&lt;script type="text/JavaScript" src="http://<?php echo $_SERVER['HTTP_HOST']; ?>/sjyl/view.php?act=js<font color="red">&c=颜色值</font><font color="blue">&k=类别值</font>"&gt;&lt;/script&gt;</td>
</tr>
<tr><td colspan="4" align="center"><b>提交方式 GET</b></td>
</tr>
<tr>
<td colspan="4" align="center"><a href="admin.php">管理员后台</a></td> 
</tr>
</table></div>
	</body></html>