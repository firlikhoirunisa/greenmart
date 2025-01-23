<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Keranjang</title>
</head>
<body>
    <h1>Daftar Keranjang</h1>
    <table border="1">
        <tr>
            <th>Cart ID</th>
            <th>User ID</th>
            <th>Product ID</th>
            <th>Quantity</th>
        </tr>
        <?php foreach ($carts as $cart): ?>
        <tr>
            <td><?= $cart->cartId; ?></td>
            <td><?= $cart->userId; ?></td>
            <td><?= $cart->productId; ?></td>
            <td><?= $cart->quantity; ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
