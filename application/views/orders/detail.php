<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Pesanan</title>
</head>
<body>
    <h1>Detail Pesanan</h1>
    <table border="1">
        <tr>
            <th>Product Name</th>
            <th>Quantity</th>
            <th>Price</th>
        </tr>
        <?php foreach ($order_items as $item): ?>
        <tr>
            <td><?= $item->productName; ?></td>
            <td><?= $item->quantity; ?></td>
            <td><?= $item->price; ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
