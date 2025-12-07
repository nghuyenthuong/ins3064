<?php

//creating a database connection - $link is a variable use for just connection class
$link=mysqli_connect("localhost","root","27072004Azura") or die(mysqli_connect_error());
mysqli_select_db($link,"product_manage") or die(mysqli_error($link));


