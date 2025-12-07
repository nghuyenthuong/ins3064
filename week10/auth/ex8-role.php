,<?php
function getInheritedPermissions($role_id, &$visited = []) {
    $conn = db();
    if (in_array($role_id, $visited)) return [];

    $visited[] = $role_id;

    $permissions = [];
    $sql = "
      SELECT p.permission_name FROM role_permissions rp
      JOIN permissions p ON rp.permission_id = p.permission_id
      WHERE rp.role_id = $role_id
    ";
    $res = mysqli_query($conn, $sql);

    while ($row = mysqli_fetch_assoc($res)) {
        $permissions[] = $row['permission_name'];
    }

    $parent = mysqli_fetch_assoc(
        mysqli_query($conn, "SELECT role_inherit FROM roles WHERE role_id=$role_id")
    )['role_inherit'];

    if ($parent) {
        $permissions = array_merge(
            $permissions,
            getInheritedPermissions($parent, $visited)
        );
    }
    return array_unique($permissions);
}

?>
