<?php
include "ex1-config.php";

$user_id = $_GET['user'] ?? 3;
$_SESSION['user_id'] = $user_id;
$_SESSION['user_role'] = $users[$user_id]['role'];

header("Location: index.php");
?>