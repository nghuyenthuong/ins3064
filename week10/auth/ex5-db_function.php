<?php
function db() {
    return mysqli_connect("localhost", "root", "", "rbac_demo");
}

function getUserPermissions($user_id) {
    $conn = db();

    $sql = "
    SELECT p.permission_name
    FROM users u
    JOIN roles r ON u.role_id = r.role_id
    JOIN role_permissions rp ON r.role_id = rp.role_id
    JOIN permissions p ON rp.permission_id = p.permission_id
    WHERE u.user_id = $user_id
    ";

    $res = mysqli_query($conn, $sql);
    $permissions = [];

    while ($row = mysqli_fetch_assoc($res)) {
        $permissions[] = $row['permission_name'];
    }
    return $permissions;
}

?>