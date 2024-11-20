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
            <h2>Sửa thông tin khách hàng</h2>
            <form action="index.php?controller=customer&action=edit" method="post">
                <input type="hidden" name="MaKH" value="<?php echo $customer['MaKH']; ?>">
                <table class="table">
                    <tr>
                        <td>Tên khách hàng</td>
                        <td><input type="text" name="TenKH" value="<?php echo $customer['TenKH']; ?>" required></td>
                    </tr>
                    <tr>
                        <td>Giới tính</td>
                        <td>
                            <select name="GioiTinh">
                                <option value="Nam" <?php echo ($customer['GioiTinh'] == 'Nam') ? 'selected' : ''; ?>>Nam</option>
                                <option value="Nữ" <?php echo ($customer['GioiTinh'] == 'Nữ') ? 'selected' : ''; ?>>Nữ</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Địa chỉ</td>
                        <td><input type="text" name="DiaChi" value="<?php echo $customer['DiaChi']; ?>" required></td>
                    </tr>
                    <tr>
                        <td>Điện thoại</td>
                        <td><input type="text" name="SDT" value="<?php echo $customer['SDT']; ?>" required></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td><input type="email" name="Email" value="<?php echo $customer['Email']; ?>" required></td>
                    </tr>
                    <tr>
                        <td colspan="2" style="text-align: center;">
                            <input type="submit" value="Cập nhật">
                            <input type="button" value="Quay lại" onclick="history.back();">
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</body>
</html>