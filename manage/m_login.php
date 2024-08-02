<?php require_once('../Connections/conn.php'); 
  session_start();
  echo @$_SESSION['login'];
  if(isset($_SESSION['login']) && $_SESSION['login']=='login'){
    header('Location:m_main.php');
  }
  else{  
    if(isset($_REQUEST['txtName']) and !empty($_REQUEST['txtName'])){ //p. 14-43
      $name=$_REQUEST['txtName'];
      $pwd=$_REQUEST['txtPwd'];
      $sql="SELECT * from member where account='".$name."' and passwd='".$pwd."'";
      // echo $sql;
      $result=mysqli_query($link, $sql);
      $rs=mysqli_fetch_assoc($result);

      if(!$rs){	
        $error_sql="SELECT * from member where account='".$name."'";
        $error_result=mysqli_query($link, $error_sql);
        $error_pwd=mysqli_fetch_assoc($error_result);
        if(!$error_pwd){
          echo "<script>alert('帳號錯誤');</script>";
        }
        else{
          echo "<script>alert('密碼錯誤');</script>";
        }
      } 
      else {
        $_SESSION['login']="login";
        // echo "<script>alert('登入成功');</script>";
        header('Location:m_main.php');
      }
    }
  }	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link href="../layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
<title>無標題文件</title>

</head>

<body>
<fieldset style="width: 21%; margin: 0 auto;">
<h3 align="center" style="margin-top:15px">登入</h3>
    <form id="form1" name="form1" method="post" action="" >
      <p>
        <label>姓名  </label>
          <input type="text" name="txtName" id="Name" />
        
      </p>
      <p>
        <label>密碼  </label>
          <input type="text" name="txtPwd"  />
        
      </p>
      <p>
          <input type="submit" name="Submit" id="button" value="送出" />
      </p>
    </form>
</fieldset>
</body>
</html>
