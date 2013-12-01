<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<title>图片界面</title>
<style type="text/css">
body{
	margin:0;
	}

</style>

</head>

<body>

<?php
require 'config.php';

$name=$_REQUEST["name"];

$result=mysql_query("SELECT src FROM `imgsave` WHERE computerName='$name'");

	
	$image=mysql_fetch_array($result)['src'];
	echo "<img id='myImg' src='$image'/>";


?>
<script>
	var getMyImg=document.getElementById("myImg");
	getMyImg.style.width=window.innerWidth+"px";
	getMyImg.style.height=window.innerHeight+"px";

</script>


</body>
</html>
