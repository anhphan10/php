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
            <h2>Danh sách loại sản phẩm</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th>Mã loại SP</th>
                        <th>Tên loại SP</th>
                        <th>Mô tả loại</th>
                        <th>Hãng sản phẩm</th>
                        <th colspan="2">Tùy chọn</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($productstype as $producttype): ?>
                    <tr>
                        <td><?php echo $producttype['MaLoaiSP']; ?></td>
                        <td><?php echo $producttype['TenLoaiSP']; ?></td>
                        <td><?php echo $producttype['MoTaLoai']; ?></td>
                        <td><?php echo $producttype['TenHangSP']; ?></td>
                        <td style="text-align: center;">
                            <a href="index.php?controller=producttype&action=edit&id=<?php echo $producttype['MaLoaiSP']; ?>">Sửa</a>
                        </td>
                        <td style="text-align: center;">
                            <a href="index.php?controller=producttype&action=delete&id=<?php echo $producttype['MaLoaiSP']; ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa loại sản phẩm này?');">Xóa</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>