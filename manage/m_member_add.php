<?php require_once('../Connections/conn.php'); 

session_start();
if(!@$_SESSION['login']){
  // echo "<script>alert('請先登入');</script>";
  header('Location:m_login.php');
}
else{
  // echo $_SESSION['login'];
}

if(isset($_POST["action"]) && ($_POST["action"] == "add")){
    $sql_query = "INSERT INTO member (account, passwd) VALUES (
      '".$_POST["account"]."',
      '".$_POST["passwd"]."')";
    mysqli_query($link,$sql_query);
    header("Location:m_member.php");
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
      管理員 新增</h3>
  <table width="30%" border="0" align="center" cellpadding="1" cellspacing="1">
    
    <tr>
      <th width="30%" height="30" align="center" bgcolor="#FFCC66" scope="row">帳號</th>
      <td width="70%" align="left"><label for="account"></label>
         <input name="account" type="text" id="account"></td>
    </tr>
    <tr>
      <th height="30" align="center" bgcolor="#FFCC66" scope="row">密碼</th>
      <td align="left"><label for="passwd"></label>
        <input name="passwd" type="text" id="passwd" >
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
<a href="m_member.php">回上一頁</a>
</center>
</body>
</html>
