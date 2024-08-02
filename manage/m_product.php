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

$sql = 'SELECT * FROM product';
$result = mysqli_query($link, $sql); 
$output = ''; 
while($record = mysqli_fetch_array($result)){ 
  $record['product_info'] = nl2br($record['product_info']);
  switch($record['product_type']){
    case "v" :
      $product_type="vegetable";
    break;
    case "f" :
      $product_type="fruit";
    break;
    case "g" :
      $product_type="grocery";
    break;
  };
if($record['product_img']!=""){
  $img=$record['product_img'];
}
else{
  $img="demo.png";
}
//  函式 nl2br ---  轉換新行成為 HTML 的<BR> 
$table=<<<EOF
<table width="600" border="1" cellpadding="0" cellspacing="0" bordercolor="#9999FF" align="center"> 
  <tr bgcolor="#9999FF">   
  <td width="20%"><div align="center"><font color="#black">$product_type</font></div></td> 
  <td width="60%"><div align="center"><font color="darkorange">$record[product_name]</font></div></td> 
  <td width="20%"><div align="center"><a href="m_product_md.php?id=$record[product_id]">修改</a></div></td> 
  </tr> 
  <tr valign="top"> 
  <td height="120" colspan="1"><img src="../images/shopping/$img"></td> 
  <td height="120" colspan="2">$record[product_info]</td> 
  </tr> 
  <tr> 
  <td colspan=1><div align="center"><font color="#black">$ $record[product_price]</font></div></td> 
  <td colspan=1><div align="center"></div></td> 
  <td colspan=1><div align="center"><a href="m_product_del.php?id=$record[product_id]" onclick="if(!confirm('確定要刪除')) { return false;}">刪除</a></div></td> 
  </tr> 
</table> 
<hr width=600 size=1 /> 
EOF;
  $output .= $table; 
} 


/*  列印輸出  */ 
echo <<<EOF
<center> 
<h3 style="margin-top:15px">產品管理</h3>
<hr width=600 size=1 >
<a href="m_product_add.php">產品新增</a>
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
