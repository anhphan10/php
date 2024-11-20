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
            <h2>Thêm mới hãng sản phẩm</h2>
            <form action="index.php?controller=productcompany&action=add" method="POST">
            <table class="table">
                <tr>
                    <td><label for="TenHangSP">Tên hãng sản phẩm:</label></td>
                    <td><input type="text" name="TenHangSP" required></td>
                </tr>
                <tr>
                    <td><label for="MoTaHang">Mô tả hãng:</label></td>
                    <td><input type="text" name="MoTaHang" required></td>
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