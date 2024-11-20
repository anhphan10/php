<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý bán hàng</title>
    <link rel="stylesheet" href="Styles/styles.css">
</head>
<body>
    <?php include 'Views/header.php'; ?>  
    <div class="main-container">
        <?php include 'Views/sidebar.php'; ?>

        <div class="main-content">
            <h2>Danh sách sản phẩm</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th>Mã SP</th>
                        <th>Tên SP</th>
                        <th>Hãng</th>
                        <th>Loại</th>
                        <th>Đơn giá</th>
                        <th>Số lượng</th>
                        <th>Mô tả SP</th>
                        <th>Hình ảnh SP</th>
                        <th colspan="2">Tùy chọn</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($products as $product): ?>
                    <tr>
                        <td><?php echo $product['MaSP']; ?></td>
                        <td><?php echo $product['TenSP']; ?></td>
                        <td><?php echo $product['Hang']; ?></td>
                        <td><?php echo $product['Loai']; ?></td>
                        <td><?php echo number_format($product['DonGia'], 0, ',', '.') . ' Vnđ'; ?></td>
                        <td><?php echo $product['SoLuong']; ?></td>
                        <td><?php echo $product['MoTaSP']; ?></td>
                        <td><a href="/21103101142_PhamVanHung_QLBH/Images/<?php echo $product['HinhAnhSP']; ?>" target="_blank">Xem ảnh</a> </td>
                        <td style="text-align: center;">
                            <a href="index.php?controller=product&action=edit&id=<?php echo $product['MaSP']; ?>">Sửa</a>
                        </td>
                        <td style="text-align: center;">
                            <a href="index.php?controller=product&action=delete&id=<?php echo $product['MaSP']; ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này?');">Xóa</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>


<!-- <script>
function toggleImage(imgElement) {
    if (imgElement.style.width === "50px") {
        imgElement.style.width = "200px"; // Phóng to ảnh
    } else {
        imgElement.style.width = "50px"; // Thu nhỏ lại
    }
}
</script> -->