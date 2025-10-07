<?php
$link = mysqli_connect("localhost", "root", "27072004Azura") or die(mysqli_connect_error());
mysqli_select_db($link, "login_demo") or die(mysqli_error($link));
?>
