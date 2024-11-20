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
            <h2>Thêm mới sản phẩm</h2>
            <form action="index.php?controller=product&action=add" method="POST">
            <table class="table">
                <tr>
                    <td><label for="TenSP">Tên sản phẩm:</label></td>
                    <td><input type="text" name="TenSP" required></td>
                </tr>
                <tr>
                    <td><label for="Hang">Hãng:</label></td>
                    <td><input type="text" name="Hang" required></td>
                </tr>
                <tr>
                    <td><label for="Loai">Loại sản phẩm:</label></td>
                    <td><input type="text" name="Loai" required></td>
                </tr>
                <tr>
                    <td><label for="DonGia">Đơn giá:</label></td>
                    <td><input style="width: 50%; height: 30px;" type="number" name="DonGia" required></td>
                </tr>   
                <tr>
                    <td><label for="SoLuong">Số lượng:</label></td>
                    <td><input style="width: 50%; height: 30px;" type="number" name="SoLuong" required></td>
                </tr>
                <tr>
                    <td><label for="MoTaSP">Mô tả sản phẩm:</label></td>
                    <td><textarea style="width: 100%; height: 50px;" name="MoTaSP" required></textarea></td>
                </tr>
                <tr>
                    <td><label for="HinhAnhSP">Hình ảnh sản phẩm:</label></td>
                    <td><input type="file" name="HinhAnhSP" accept="image/*" required></td>
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