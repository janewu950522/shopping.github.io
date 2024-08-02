<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="../layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
<title>無標題文件</title>
</head>
</body>
<?php require_once('../Connections/conn.php'); 
session_start();
if(!@$_SESSION['login']){
  // echo "<script>alert('請先登入');</script>";
  header('Location:m_login.php');
}
else{
  // echo $_SESSION['login'];
}

$sql = 'SELECT * FROM news ORDER BY news_id DESC';
$result = mysqli_query($link, $sql); 
$output = ''; 
while($record = mysqli_fetch_array($result)){ 
  $record['main'] = nl2br($record['main']);   
//  函式 nl2br ---  轉換新行成為 HTML 的<BR> 
$table=<<<EOF
<table width="600" border="1" cellpadding="0" cellspacing="0" bordercolor="#9999FF" align="center"> 
  <tr bgcolor="#9999FF">   
  <td width="20%"></td> 
  <td width="60%"><div align="center"><font color="darkorange">$record[title]</font></div></td> 
  <td width="20%"><div align="center"><font color="#black">color：$record[color]</font></div></td> 
  </tr> 
  <tr valign="top"> 
  <td height="120" colspan="4">$record[main]</td> 
  </tr> 
  <tr> 
  <td colspan=1><div align="center"><a href="m_news_md.php?id=$record[news_id]">修改</a></div></td> 
  <td colspan=1><div align="center"><font color="#black">$record[date]</font></div></td> 
  <td colspan=1><div align="center"><a href="m_news_del.php?id=$record[news_id]" onclick="if(!confirm('確定要刪除')) { return false;}">刪除</a></div></td> 
  </tr> 
</table> 
<hr width=600 size=1 /> 
EOF;
  $output .= $table; 
} 


/*  列印輸出  */ 
echo <<<EOF
<center> 
<h3 style="margin-top:15px">News 管理</h3>
<hr width=600 size=1 >
<a href="m_news_add.php">News 新增</a>
<hr width=600 size=1 >
</center> 
$output 
EOF;
echo '
<center>
<a href="m_main.php">
回首頁
</a>
<br>
<br>
</center>'; 
?>
</body>
</html>
