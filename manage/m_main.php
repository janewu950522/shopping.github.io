<?php
  session_start();
  if(!@$_SESSION['login']){
    // echo "<script>alert('請先登入');</script>";
    header('Location:m_login.php');
  }
  else{
    // echo $_SESSION['login'];
  }
  
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="../layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
<title>無標題文件</title>
</head>

<body>
<h3 align="center" style="margin-top:15px">生鮮蔬果網　管理主介面</h3>
<table width="80%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <th width="20%" height="30" bgcolor="#FFCC66" scope="col"><a href="m_news.php">News管理</a></th>
    <th width="20%" height="30" bgcolor="#FFCC66" scope="col"><a href="m_msg.php">留言板管理</a></th>
    <th width="20%" height="30" bgcolor="#FFCC66" scope="col"><a href="m_product.php">產品管理</a></th>
    <th width="20%" height="30" bgcolor="#FFCC66" scope="col"><a href="m_list.php">訂單管理</a></th>
    <th width="20%" height="30" bgcolor="#FFCC66" scope="col"><a href="m_member.php">帳號管理</a></th>
  </tr>
</table>
<p>&nbsp;</p>
<div align="center">
<a href="../index.php?login=logout">
登出
</a>|
<a href="../index.php">
回前端首頁
</a>
</div>
</body>
</html>