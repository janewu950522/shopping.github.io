<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>無標題文件</title>
</head>

<body>
<?php 
	$sql = 'SELECT * FROM guestbook ORDER BY post_time DESC'; 
	$result = mysqli_query($link, $sql); 
	 
	/*  處理查詢結果  */ 
	$output = ''; 
	while($record = mysqli_fetch_array($result)){ 
	$record['email'] = strlen(trim($record['email'])) > 0?'<a href=mailto:'.$record['email'].'><i class="far fa-envelope rgtspace-5"></i> Mail Me</a>':'&nbsp;';
	$record['content'] = nl2br($record['content']);   
	//  函式 nl2br ---  轉換新行成為 HTML 的<BR> 
$table=<<<EOF
	<table width="600" border="1" cellpadding="0" cellspacing="0" bordercolor="#9999FF" align="center"> 
	<tr bgcolor="#9999FF">   
		<td width="33%"><font color=" darkorange">$record[name]：</font></td> 
		<td width="33%"><div align="center"><font color="#FFFFFF">$record[email]</font></div></td> 
		<td width="33%"><div align="right"><font color="darkorange">$record[post_time]</font></div></td> 
	</tr> 
	<tr valign="top"> 
		<td height="60" colspan="4">$record[content]</td> 
	</tr> 
	</table> 
	<hr width=600 size=1 /> 
EOF;
	$output .= $table; 
	} 
	
echo <<<EOF
	<center> 
	<h2><b>留言板</b></h2><br>
	<a href="message.php"><span  class="custom-btn btn-5 "style="float:left; text-align: center; text-decoration: none;">我要留言</span></a>
	<hr>
	</center> 
	$output 
EOF;
?> 
</body>
</html>