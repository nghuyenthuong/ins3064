<?php
session_start();

/* Roles & permissions */
$roles = [
    'admin' => ['view_user', 'create_user', 'edit_user', 'delete_user'],
    'user'  => ['view_user', 'edit_own_profile'],
    'guest' => ['view_user']
];

/* Users & roles */
$users = [
    1 => ['username' => 'Alice', 'role' => 'admin'],
    2 => ['username' => 'Bob',   'role' => 'user'],
    3 => ['username' => 'Tom',   'role' => 'guest']
];
?>