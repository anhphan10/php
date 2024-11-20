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
            <h2>Danh sách khách hàng</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th>Mã KH</th>
                        <th>Tên KH</th>
                        <th>Giới tính</th>
                        <th>Địa chỉ</th>
                        <th>SĐT</th>
                        <th>Email</th>
                        <th colspan="2">Tùy chọn</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($customers as $customer): ?>
                    <tr>
                        <td><?php echo $customer['MaKH']; ?></td>
                        <td><?php echo $customer['TenKH']; ?></td>
                        <td><?php echo $customer['GioiTinh']; ?></td>
                        <td><?php echo $customer['DiaChi']; ?></td>
                        <td><?php echo $customer['SDT']; ?></td>
                        <td><?php echo $customer['Email']; ?></td>
                        <td style="text-align: center;">
                            <a href="index.php?controller=customer&action=edit&id=<?php echo $customer['MaKH']; ?>">Sửa</a>
                        </td>
                        <td style="text-align: center;">
                            <a href="index.php?controller=customer&action=delete&id=<?php echo $customer['MaKH']; ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa khách hàng này?');">Xóa</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>