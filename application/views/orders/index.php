<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pesanan</title>
</head>
<body>
    <h1>Daftar Pesanan</h1>
    <table border="1">
        <tr>
            <th>Order ID</th>
            <th>Tanggal Pesanan</th>
            <th>Detail</th>
        </tr>
        <?php foreach ($orders as $order): ?>
        <tr>
            <td><?= $order->orderId; ?></td>
            <td><?= $order->orderDate; ?></td>
            <td><a href="<?= site_url('orders/detail/'.$order->orderId); ?>">Lihat Detail</a></td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
