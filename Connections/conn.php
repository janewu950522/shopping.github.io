<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_connet = "sql212.epizy.com";
$database_connet = "epiz_29832076_shop";
$username_connet = "epiz_29832076";
$password_connet = "yqAuZkD87J";
$link = mysqli_connect($hostname_connet, $username_connet, $password_connet,$database_connet) or trigger_error(mysql_error(),E_USER_ERROR); 
mysqli_query($link, "set names 'utf8'");
?>