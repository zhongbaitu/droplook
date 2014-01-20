<?php
//连接mysql
$con=mysql_connect("10.4.3.92:3306","uYdAPErmgLJVH","piqLAUI3SJKgK") or die("数据库连接失败");

// 设置字符
mysql_query ( "SET NAMES UTF8" );



//选择数据库
mysql_select_db("d119a5269a28e4d8bb6bf6bcfa7daced7",$con) or die ("数据库不存在或不可用");

?>


