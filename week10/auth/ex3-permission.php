function checkAccess($permission) {
    global $roles;
    $role = $_SESSION['user_role'] ?? 'guest';
    return in_array($permission, $roles[$role]);
}
?>