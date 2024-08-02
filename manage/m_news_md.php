<?php require_once('../Connections/conn.php'); 

session_start();
if(!@$_SESSION['login']){
  // echo "<script>alert('請先登入');</script>";
  header('Location:m_login.php');
}
else{
  // echo $_SESSION['login'];
}

    $sql = 'SELECT * FROM news WHERE news_id='.$_GET['id']; 
    $result = mysqli_query($link, $sql); 
    $record = mysqli_fetch_array($result); 	
    if(isset($_POST["action"]) && ($_POST["action"] == "edit")){ 
        $sql = "UPDATE news SET title='$_POST[title]',color='$_POST[color]', main='$_POST[main]' WHERE news_id=$_GET[id]"; 
        mysqli_query($link, $sql); 
        header("Location:m_news.php"); 
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
      News修改</h3>
  <table width="30%" border="0" align="center" cellpadding="1" cellspacing="1">
    
    <tr>
      <th width="30%" height="30" align="center" bgcolor="#FFCC66" scope="row">標題</th>
      <td width="70%" align="left"><label for="title"></label>
         <input name="title" type="text" id="title" value=<?php echo $record['title']; ?>></td>
    </tr>
    <tr>
      <th height="30" align="center" bgcolor="#FFCC66" scope="row">日期</th>
      <td align="left"><label for="date"></label>
        <input name="date" type="text" id="date" readonly value=<?php echo $record['date']; ?>>
    </tr>
    <tr>
      <th height="30" align="center" bgcolor="#FFCC66" scope="row">內容</th>
      <td align="left"><label for="main"></label>
        <textarea name="main" rows="7" id="main"><?php echo $record['main']; ?></textarea></td>
    </tr>
    <tr>
      <th height="30" align="center" bgcolor="#FFCC66" scope="row">顏色</th>
      <td align="left"><label for="main2"></label>
        <label for="color"></label>
        <select name="color" id="color">
          <option value="danger" selected>red</option>
          <option value="info">blue</option>
          <option value="success">green</option>
          <option value="warning">orange</option>
      </select></td>
    </tr>
    <tr>
      <th height="30" colspan="2" align="center"><input type="submit" style="color:black" name="button" id="button" value="確定">
      </th>
    </tr>
  </table>
  <input type="hidden" name="action" value="edit">
</form>
<hr>
<center>
<a href="m_news.php">回上一頁</a>
</center>
</body>
</html>
