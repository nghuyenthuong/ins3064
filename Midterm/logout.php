<?php
// Lưu ý: KHÔNG dùng session_start() vì bạn không muốn sử dụng Session.

// Chuyển hướng người dùng về trang đăng nhập (login.php)
// Đây là hành động duy nhất của "Logout" khi không có Session.
header("Location: login.php");
exit;
?>