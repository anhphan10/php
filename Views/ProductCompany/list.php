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
            <h2>Danh sách hãng sản phẩm</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th>Mã hãng SP</th>
                        <th>Tên hãng SP</th>
                        <th>Mô tả hãng</th>
                        <th colspan="2">Tùy chọn</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($productscompany as $productcompany): ?>
                    <tr>
                        <td><?php echo $productcompany['MaHangSP']; ?></td>
                        <td><?php echo $productcompany['TenHangSP']; ?></td>
                        <td><?php echo $productcompany['MoTaHang']; ?></td>
                        <td style="text-align: center;">
                            <a href="index.php?controller=productcompany&action=edit&id=<?php echo $productcompany['MaHangSP']; ?>">Sửa</a>
                        </td>
                        <td style="text-align: center;">
                            <a href="index.php?controller=productcompany&action=delete&id=<?php echo $productcompany['MaHangSP']; ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa hãng sản phẩm này?');">Xóa</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>