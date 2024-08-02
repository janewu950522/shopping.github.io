<?php require_once('../Connections/conn.php'); 

session_start();
if(!@$_SESSION['login']){
  // echo "<script>alert('請先登入');</script>";
  header('Location:m_login.php');
}
else{
  // echo $_SESSION['login'];
}

echo @$_SESSION['upload'];

if(isset($_POST["action"]) && ($_POST["action"] == "add")){
    $sql_query = "INSERT INTO product (product_name  , product_price, product_info, product_type, product_img) VALUES (
      '".$_POST["name"]."',
      '".$_POST["price"]."',
      '".$_POST["info"]."',
      '".$_POST["type"]."',
      '".$_SESSION['upload']."')";
    mysqli_query($link,$sql_query);
    unset($_SESSION['upload']);
    header("Location:m_product.php");
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
<form name="form1" method="POST" action="">
		<h3 style="margin-top:15px" align="center">
      產品新增</h3>
  <table width="30%" border="0" align="center" cellpadding="1" cellspacing="1">
    
    <tr>
      <th width="30%" height="30" align="center" bgcolor="#FFCC66" scope="row">品名</th>
      <td width="70%" align="left"><label for="name"></label>
         <input name="name" type="text" id="name"></td>
    </tr>
    <tr>
      <th height="30" align="center" bgcolor="#FFCC66" scope="row">$價格</th>
      <td align="left"><label for="price"></label>
        <input name="price" type="text" id="price">
    </tr>
    <tr>
      <th height="30" align="center" bgcolor="#FFCC66" scope="row">介紹</th>
      <td align="left"><label for="info"></label>
        <textarea name="info" rows="7" id="info"></textarea></td>
    </tr>
    <tr>
      <th height="30" align="center" bgcolor="#FFCC66" scope="row">類別</th>
      <td align="left">
        <label for="type"></label>
        <select name="type" id="type">
          <option value="v" selected>vegetable</option>
          <option value="f">fruit</option>
          <option value="g">grocery</option>
      </select></td>
    </tr>
    <tr>
      <th height="30" align="center" bgcolor="#FFCC66" scope="row">圖片</th>
      <td align="left"><label for="info"></label>
      <input type="button" name="Submit" value="上傳圖片" onClick="window.open(' upload.php ', 'Yahoooooo', config='height=600,width=800')">
    </tr>
    <tr>
      <th height="30" colspan="2" align="center"><input type="submit" style="color:black" name="button" id="button" value="確定">
      </th>
    </tr>
  </table>
  <input type="hidden" name="action" value="add">
</form>
<hr>
<center>
<a href="m_product.php">回上一頁</a>
</center>
</body>
</html>
