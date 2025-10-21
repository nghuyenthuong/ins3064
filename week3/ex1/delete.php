<?php
include "connection.php";

$id=$_GET["id"];
mysqli_query($link,"delete from laptops where id=$id");
header("location.index(1).php");
?>

<script type="text/javascript">
 window.location="index.php";
    </script>



