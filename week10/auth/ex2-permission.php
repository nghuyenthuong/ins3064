<?php
include "ex1-config.php";

function hasPermission($user_id, $permission) {
    global $users, $roles;

    if (!isset($users[$user_id])) return false;

    $role = $users[$user_id]['role'];
    return in_array($permission, $roles[$role]);
}
?>