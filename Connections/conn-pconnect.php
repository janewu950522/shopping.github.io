<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_connet = "sql212.epizy.com";
$database_connet = "epiz_29832076_shop";
$username_connet = "epiz_29832076";
$password_connet = "yqAuZkD87J";
$connet = mysql_connect($hostname_connet, $username_connet, $password_connet) or trigger_error(mysql_error(),E_USER_ERROR); 
mysql_query("set names 'utf8'");
?>