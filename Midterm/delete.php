

<?php
include "connect.php"; // Kết nối đến database

// Kiểm tra xem có ID được gửi qua URL không
if (isset($_GET["id"]) && is_numeric($_GET["id"])) {
    $id = $_GET["id"];

    // --- Bước 1: Lấy đường dẫn ảnh để xóa file vật lý (nếu có) ---
    $sql_get_image = "SELECT image_url FROM products WHERE id = $id";
    $result = mysqli_query($link, $sql_get_image);

    if ($row = mysqli_fetch_assoc($result)) {
        $image_path = $row['image_url'];

        // Kiểm tra file có tồn tại không rồi mới xóa
        if (!empty($image_path) && file_exists($image_path)) {
            unlink($image_path);
        }
    }

    // --- Bước 2: Xóa sản phẩm trong database ---
    $sql_delete = "DELETE FROM products WHERE id = $id";
    mysqli_query($link, $sql_delete);

    // --- Bước 3: Quay lại trang chính ---
    header("Location: index.php");
    exit();
} else {
    // Nếu không có ID hợp lệ, cũng quay lại trang chính
    header("Location: index.php");
    exit();
}
?>
