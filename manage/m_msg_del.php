<?php require_once('../Connections/conn.php'); 
if($_GET['id']){
  $sql_del = "DELETE FROM guestbook WHERE id=".$_GET['id'].""; 
  mysqli_query($link,$sql_del); 
  header('Location:m_msg.php');
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>無標題文件</title>
</head>

<body>
</body>
</html>
