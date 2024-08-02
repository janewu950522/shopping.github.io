<?php require_once('../Connections/conn.php'); 

session_start();
if(!@$_SESSION['login']){
  // echo "<script>alert('請先登入');</script>";
  header('Location:m_login.php');
}
else{
  // echo $_SESSION['login'];
}

    $sql = 'SELECT * FROM product WHERE product_id='.$_GET['id']; 
    $result = mysqli_query($link, $sql); 
    $record = mysqli_fetch_array($result); 	
    if(isset($_POST["action"]) && ($_POST["action"] == "edit")){ 
        if(!@$_SESSION['upload']){
          $photo=$record['product_img'];
        }
        else{
          $photo=$_SESSION['upload'];
        }

        $sql = "UPDATE product SET product_name='$_POST[name]', product_type='$_POST[type]', product_info='$_POST[info]', product_img='$photo', product_price='$_POST[price]' WHERE product_id=$_GET[id]"; 
        mysqli_query($link, $sql);
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

<h3 style="margin-top:15px" align="center">產品修改</h3>
<form action="" id="form1" name="form1" method="POST">
  <table width="50%" border="0" align="center" cellpadding="1" cellspacing="1">
  <tr>
      <th width="30%" height="30" align="center" bgcolor="#FFCC66" scope="row">品名</th>
      <td width="70%" align="left"><label for="name"></label>
         <input name="name" type="text" id="name" value="<?php echo $record['product_name']; ?>"></td>
    </tr>
    <tr>
      <th height="30" align="center" bgcolor="#FFCC66" scope="row">$價格</th>
      <td align="left"><label for="price"></label>
        <input name="price" type="text" id="price" value="<?php echo $record['product_price']; ?>">
    </tr>
    <tr>
      <th height="30" align="center" bgcolor="#FFCC66" scope="row">介紹</th>
      <td align="left"><label for="info"></label>
        <textarea name="info" rows="7" id="info"><?php echo $record['product_info']; ?></textarea></td>
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
      <img src="../images/shopping/<?php echo $record['product_img']; ?>">
      <input type="button" name="Submit" value="上傳圖片" onClick="window.open(' upload.php ', 'Yahoooooo', config='height=600,width=800')">
    </tr>
    <tr>
      <th height="30" colspan="2" align="center"><input type="submit" style="color:black" name="button" id="button" value="確定">
      </th>
    </tr>
  </table>
  <input type="hidden" name="action" value="edit" />
</form>
<hr>
<center>
<a href="m_product.php">回上一頁</a>
</center>
</body>
</html>
