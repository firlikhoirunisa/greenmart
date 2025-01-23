<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
</head>
<body>
    <h1>Checkout</h1>
    <h2>Keranjang Anda</h2>
    <table border="1">
        <tr>
            <th>Product ID</th>
            <th>Quantity</th>
        </tr>
        <?php foreach ($cart_items as $item): ?>
        <tr>
            <td><?= $item->productId; ?></td>
            <td><?= $item->quantity; ?></td>
        </tr>
        <?php endforeach; ?>
    </table>

    <form action="<?= site_url('checkout/process'); ?>" method="post">
        <button type="submit">Proses Pesanan</button>
    </form>
</body>
</html>
