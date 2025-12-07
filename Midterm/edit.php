<?php
include 'connect.php';

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $image_path = $_POST['old_image']; 


    if (isset($_FILES["image"]) && $_FILES["image"]["size"] > 0) {
        if (!empty($image_path) && file_exists($image_path)) {
            unlink($image_path);
        }
        // Tải ảnh mới lên
        $target_dir = "uploads/";
        $image_name = time() . '_' . basename($_FILES["image"]["name"]);
        $target_file = $target_dir . $image_name;
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            $image_path = $target_file; // Lấy đường dẫn ảnh mới
        }
    }

    $sql_update = "UPDATE products SET name = ?, description = ?, price = ?, image_url = ? WHERE id = ?";
    $stmt = mysqli_prepare($link, $sql_update);
    mysqli_stmt_bind_param($stmt, "ssdsi", $name, $description, $price, $image_path, $id);
    mysqli_stmt_execute($stmt);

    // Cập nhật xong thì quay về trang chủ
    header("Location: index.php");
    exit();
}


if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    header("Location: index.php");
    exit();
}
$id_to_edit = $_GET['id'];

// Truy vấn lấy thông tin sản phẩm cần sửa
$sql_edit = "SELECT * FROM products WHERE id = ?";
$stmt_edit = mysqli_prepare($link, $sql_edit);
mysqli_stmt_bind_param($stmt_edit, "i", $id_to_edit);
mysqli_stmt_execute($stmt_edit);
$result_edit = mysqli_stmt_get_result($stmt_edit);
$product = mysqli_fetch_assoc($result_edit);

// Nếu không tìm thấy sản phẩm thì về trang chủ
if (!$product) {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Product</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-4">
        <div class="card">
            <div class="card-header">
                <h3>Edit Product: <?php echo htmlspecialchars($product['name']); ?></h3>
            </div>
            <div class="card-body">
                <!-- Form này sẽ submit đến chính nó để khối PHP ở trên xử lý -->
                <form action="edit.php" method="POST" enctype="multipart/form-data">
                    <!-- Input ẩn để gửi ID đi, RẤT QUAN TRỌNG -->
                    <input type="hidden" name="id" value="<?php echo $product['id']; ?>">
                    
                    <div class="form-group">
                        <label>Product Name</label>
                        <input type="text" name="name" class="form-control" value="<?php echo htmlspecialchars($product['name']); ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea name="description" class="form-control"><?php echo htmlspecialchars($product['description']); ?></textarea>
                    </div>
                    <div class="form-group">
                        <label>Price</label>
                        <input type="number" name="price" step="0.01" class="form-control" value="<?php echo $product['price']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Current Image</label><br>
                        <?php if(!empty($product['image_url'])): ?>
                            <img src="<?php echo $product['image_url']; ?>" style="width: 150px;">
                        <?php endif; ?>
                        <!-- Input ẩn để lưu đường dẫn ảnh cũ -->
                        <input type="hidden" name="old_image" value="<?php echo $product['image_url']; ?>">
                    </div>
                    <div class="form-group">
                        <label>Upload New Image (leave blank to keep current image)</label>
                        <input type="file" name="image" class="form-control-file">
                    </div>
                    <!-- Nút submit có name="update" -->
                    <button type="submit" name="update" class="btn btn-primary">Update Product</button>
                    <a href="index.php" class="btn btn-secondary">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</body>
</html>