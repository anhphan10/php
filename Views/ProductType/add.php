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
            <h2>Thêm mới loại sản phẩm</h2>
            <form action="index.php?controller=producttype&action=add" method="POST">
            <table class="table">
                <tr>
                    <td><label for="TenLoaiSP">Tên loại sản phẩm:</label></td>
                    <td><input type="text" name="TenLoaiSP" required></td>
                </tr>
                <tr>
                    <td><label for="MaHangSP">Hãng sản phẩm:</label></td>
                    <td>
                        <select name="MaHangSP" required>
                            <option value="">Chọn hãng sản phẩm</option>
                            <?php foreach($companies as $company): ?>
                                <option value="<?php echo $company['MaHangSP']; ?>">
                                    <?php echo $company['TenHangSP']; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><label for="MoTaLoai">Mô tả loại:</label></td>
                    <td><input type="text" name="MoTaLoai" required></td>
                </tr>
                <tr>
                    <td colspan="2" style="text-align: center;">
                        <input type="submit" value="Thêm mới">
                        <input type="button" value="Quay lại" onclick="history.back();">
                    </td>
                </tr>
            </table>
            </form>
        </div>
    </div>
</body>
</html>