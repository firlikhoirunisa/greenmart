<!DOCTYPE html>
<html lang="en">
 <head>
  <meta charset="utf-8"/>
  <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
  <title>
   Shopping Cart
  </title>
  <link crossorigin="anonymous" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" rel="stylesheet"/>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
  <style>
   body {
            font-family: 'Arial', sans-serif;
        }
        .navbar-brand {
            font-family: 'Arial', sans-serif;
            font-size: 24px;
            font-weight: bold;
            color: #4CAF50;
        }
        .navbar-brand span {
            color: #000;
        }
        .cart-table img {
            width: 50px;
            height: 50px;
        }
        .cart-table th, .cart-table td {
            vertical-align: middle;
        }
        .cart-total {
            border: 1px solid #ddd;
            padding: 20px;
            border-radius: 5px;
        }
        .btn-green {
            background-color: #4CAF50;
            color: #fff;
        }
        .btn-green:hover {
            background-color: #45a049;
        }
        .footer-link {
            color: #4CAF50;
            text-decoration: none;
        }
        .footer-link:hover {
            text-decoration: underline;
        }
  </style>
 </head>
 <body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
   <div class="container">
    <a class="navbar-brand" href="#">
     GREEN
     <span>
      MART
     </span>
    </a>
    <form class="d-flex ms-auto">
     <input aria-label="Search" class="form-control me-2" placeholder="Cari di GreenMart" type="search"/>
     <button class="btn btn-outline-success" type="submit">
      <i class="fas fa-search">
      </i>
     </button>
    </form>
    <ul class="navbar-nav ms-3">
     <li class="nav-item">
      <a class="nav-link" href="#">
       <i class="fas fa-heart">
       </i>
      </a>
     </li>
     <li class="nav-item">
      <a class="nav-link" href="#">
       <i class="fas fa-shopping-cart">
       </i>
      </a>
     </li>
     <li class="nav-item">
      <a class="nav-link" href="#">
       Toko
      </a>
     </li>
     <li class="nav-item">
      <a class="nav-link" href="#">
       <i class="fas fa-user">
       </i>
       User
      </a>
     </li>
    </ul>
   </div>
  </nav>
    <div class="container mt-4">
        <h2 class="text-center mb-4">Daftar Pesanan</h2>

        <?php if ($this->session->flashdata('success')): ?>
            <div class="alert alert-success" role="alert">
                <?= $this->session->flashdata('success'); ?>
            </div>
        <?php endif; ?>

        <?php if ($this->session->flashdata('error')): ?>
            <div class="alert alert-danger" role="alert">
                <?= $this->session->flashdata('error'); ?>
            </div>
        <?php endif; ?>
        <div class="container my-5">
        <a href="<?php echo site_url('index.php/dashboard');?>" class="btn btn-secondary">Kembali ke dashboard</a>
        </div>
            
        <table class="table table-bordered table-hover">
            <thead class="table-dark">
                <tr class="text-center">
                    <th>Username</th>
                    <th>Email</th>
                    <th>Alamat</th>
                    <th>No. Telepon</th>
                    <th>Metode Pembayaran</th>
                    <th>Status Pembayaran</th>
                    <th>Status Pesanan</th>
                    <th>Produk</th>
                    <th>Jumlah</th>
                    <th>Harga</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($order)): ?>
                    <?php foreach ($order as $item): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($item->username); ?></td>
                            <td><?php echo htmlspecialchars($item->email); ?></td>
                            <td><?php echo htmlspecialchars($item->address); ?></td>
                            <td><?php echo htmlspecialchars($item->phoneNumber); ?></td>
                            <td class="text-center"><?php echo htmlspecialchars($item->paymentMethod); ?></td>
                            <td class="text-center">
                                <?php if ($item->paymentStatus == 'Paid'): ?>
                                    <span class="badge bg-success">Lunas</span>
                                <?php else: ?>
                                    <span class="badge bg-danger">Belum Lunas</span>
                                <?php endif; ?>
                            </td>
                            <td class="text-center"><?php echo htmlspecialchars($item->orderStatus); ?></td>
                            <td><?php echo htmlspecialchars($item->productName); ?></td>
                            <td class="text-center"><?php echo htmlspecialchars($item->quantity); ?></td>
                            <td>Rp <?php echo number_format($item->price, 0, ',', '.'); ?></td>
                            
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="11" class="text-center text-muted">Tidak ada data pesanan tersedia</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Bootstrap Script -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
