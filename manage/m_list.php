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
  // echo "<scrip>alert('請先登入');</script>";
  header('Location:m_login.php');
}
else{
  // echo $_SESSION['login'];
}

$sql = 'SELECT * FROM buy ORDER BY id DESC';
$result = mysqli_query($link, $sql); 



/*  列印輸出  */ 
echo '<center> 
<h3 style="margin-top:15px">訂單 管理</h3>
<hr width=600 size=1 />
</center>';

while($record = mysqli_fetch_array($result)){ 
    $record['email'] = strlen(trim($record['email'])) > 0?'<a href=mailto:'.$record['email'].'><i class="far fa-envelope rgtspace-5"></i> Mail Me</a>':'&nbsp;';
    $record['note'] = nl2br($record['note']);   
  //  函式 nl2br ---  轉換新行成為 HTML 的<BR> 
  $sql_catch= 'SELECT name FROM list where id="'.$record['id'].'"';
  $result_catch= mysqli_query($link, $sql_catch);
  echo '
  <table width="600" border="1" cellpadding="0" cellspacing="0" bordercolor="#9999FF" align="center"> 
    <tr bgcolor="#9999FF">   
    <td width="25%"><font color="#black"># '.$record['id'].'</font></td> 
    <td width="25%"><div align="center"><font color="#black"><i class="fas fa-phone rgtspace-5"></i>'.$record['phone'].'</font></div></td> 
    <td width="25%"><div align="center"><font color="#FFFFFF">'.$record['email'].'</font></div></td> 
    <td width="25%"><div align="left"><font color="#black">'.$record['name'].'：</font></div></td> 
    </tr> 
    <tr> 
    <td height="120" colspan="1" align="center" valign="middle"><div >'.$record['address'].'</div></td> 
    <td height="120" colspan="2">';

    while($product_name= mysqli_fetch_array($result_catch)){ 
        echo $product_name['name'].'*1'."<br>";
      }
    
    echo '</td> 
    <td height="120" colspan="1">'.$record['note'].'</td> 
    </tr> 
    <tr> 
    <td colspan=1><div align="center"><font color="#black">'.$record['time'].'</font></div></td> 
    <td colspan=2><div align="center"><font color="#black">$ '.$record['total'].'</font></div></td> 
    <td colspan=1><div align="center"><a href="m_list_del.php?id='.$record['id'].'">確定出貨</a></div></td> 
    </tr> 
  </table> 
  <hr width=600 size=1 />'; 
      
  } 
echo '<center>
<a href="m_main.php">
回首頁
</a>
<br>
<br>
</center>'; 
?>
</body>
</html>
