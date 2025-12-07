<?php
include "db_functions.php";

function addPermissionToRole($role_id, $permission_id) {
    $conn = db();
    mysqli_query($conn,
        "INSERT INTO role_permissions VALUES ($role_id,$permission_id)");
}

function removePermissionFromRole($role_id, $permission_id) {
    $conn = db();
    mysqli_query($conn,
        "DELETE FROM role_permissions WHERE role_id=$role_id AND permission_id=$permission_id");
}
?>

<form method="post">
    Role ID: <input name="role_id">
    Permission ID: <input name="permission_id">
    <button name="add">Add</button>
    <button name="remove">Remove</button>
</form>

<?php
if (isset($_POST['add'])) {
    addPermissionToRole($_POST['role_id'], $_POST['permission_id']);
    echo "Permission added";
}
if (isset($_POST['remove'])) {
    removePermissionFromRole($_POST['role_id'], $_POST['permission_id']);
    echo "Permission removed";
}
?>
