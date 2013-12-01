<?php header("Content-type:text / html; charset=utf-8");?>
<?php

require 'config.php';
//获取主机IP
$ip = $_SERVER["REMOTE_ADDR"];
//获取主机名称
$clientName= gethostbyaddr($ip);


if ((($_FILES ["file"] ["type"] == "image/gif") || ($_FILES ["file"] ["type"] == "image/jpeg") || ($_FILES ["file"] ["type"] == "image/jpg") || ($_FILES ["file"] ["type"] == "image/png")) && ($_FILES ["file"] ["size"] < 9000000)) {
	if ($_FILES ["file"] ["error"] > 0) {
		echo "错误: " . $_FILES ["file"] ["error"] . "<br />";
	} else {
		//给文件重命名
			$uptype = explode(".", $_FILES["file"]["name"]);
			$newname = $clientName.".".$uptype[1];
			$_FILES["file"]["name"] = $newname;
			//上传文件
			move_uploaded_file ( $_FILES ["file"] ["tmp_name"], "images/" . $_FILES ["file"] ["name"] );
			$filename = "images/" . $_FILES ["file"] ["name"];
			$image = imagecreatefromjpeg($filename);
			//图片质量压缩
			imagejpeg($image, "images/" . $_FILES ["file"] ["name"], 70);
	}
  }
else {
	echo "文件无效";
}
//保存路径
$image = "images/" . $_FILES ["file"] ["name"];

$result=mysql_query("SELECT computerName FROM `imgsave` WHERE computerName='$clientName'");

//是否已经存在该主机，不存在就insert，存在就update

if(mysql_fetch_array($result)['computerName']==""){

	$result = mysql_query ( "insert into imgsave (`src`,`computerName`) values ('$image','$clientName') " );
	
	if ($result) {
		header ( 'Location:  qrcode.php' );
	} else {
		echo "发生错误";
	}
	
}else{

	 	$result=mysql_query("UPDATE `imgsave` SET `src`='$image' where computerName='$clientName'");
	 	//我跳
		header ( 'Location:  qrcode.php' );

}

?>