<?php
//连接mysql
$con=mysql_connect("localhost:3306","root","") or die("数据库连接失败");

//设置字符
mysql_query ( "SET NAMES UTF8" );

//选择数据库
mysql_select_db("airdata",$con) or die ("数据库不存在或不可用");

?>


