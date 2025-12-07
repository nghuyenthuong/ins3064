<?php
include "ex3-permission.php";
?>

<h2>RBAC Demo</h2>

<a href="login.php?user=1">Login Admin</a> |
<a href="login.php?user=2">Login User</a> |
<a href="login.php?user=3">Login Guest</a> |
<a href="logout.php">Logout</a>

<hr>

<?php if (checkAccess('view_user')): ?>
    <a href="#">View Users</a><br>
<?php endif; ?>

<?php if (checkAccess('edit_user')): ?>
    <a href="#">Edit User</a><br>
<?php endif; ?>

<?php if (checkAccess('delete_user')): ?>
    <a href="admin_page.php">Delete User</a><br>
<?php endif; ?>
