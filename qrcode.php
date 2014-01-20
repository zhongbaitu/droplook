<?php

$ip = $_SERVER["REMOTE_ADDR"];

$clientName= gethostbyaddr($ip);

echo "<img src='https://chart.googleapis.com/chart?cht=qr&chs=200x200&choe=UTF-8&chld=L|4&chl=http://droplook.sturgeon.mopaas.com/show.php?name=".$clientName."'/>" ;



?>