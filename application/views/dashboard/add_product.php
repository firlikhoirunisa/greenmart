<h1>Dashboard</h1>
<a href="<?php echo site_url('dashboard/add_product'); ?>">Add New Product</a>
<table>
    <thead>
        <tr>
            <th>Product Name</th>
            <th>Description</th>
            <th>Price</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($products as $product): ?>
            <tr>
                <td><?php echo $product->name; ?></td>
                <td><?php echo $product->description; ?></td>
                <td><?php echo $product->price; ?></td>
                <td>
                    <a href="<?php echo site_url('product/view/'.$product->id); ?>">View</a>
                    <!-- You can add Edit/Delete links here -->
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
