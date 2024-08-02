<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>上傳檔案範例</title>
</head>

<body>
<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" name="form1" enctype="multipart/form-data">
  <p>選取要上傳的檔案：
    <input  name="file" type="file" size="40">
    <input type="submit" name="submit" value="送出">
    <input type="hidden" name="max_file_size" value="1024000000000000000"> <!--限定上傳檔案大，單位bytes ，102400000=100M -->
</form>
<?php
if(isset($_POST['submit']) && $_FILES['file']['name']!==""){
  if($_FILES['file']['error']>0){
    echo "upload fail<br>";
  }else{
    copy($_FILES['file']['tmp_name'],"../images/shopping/".$_FILES['file']['name']);
    // move_uploaded_file($_FILES['file']['tmp_name'],"uplaod/".$_FILES['file']['name']);
    echo "<script>alert('上傳成功！');</script>";
  }
$_SESSION['upload']=$_FILES['file']['name'];
echo "注意：由於這是我手寫的upload程式，\n所以圖片在修改頁面並不會即時更新，\n須等按下修改後方能呈現效果，請見諒...";
echo "<hr>";
echo "檔案名稱：".$_FILES['file']['name']."<br>";
echo "檔案大小：".$_FILES['file']['size']."<br>";
echo "檔案類型：".$_FILES['file']['type']."<br>";
echo "暫存檔案：".$_FILES['file']['tmp_name']."<br>";
}
?>
</body>
</html>