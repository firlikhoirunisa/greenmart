<!-- Detail Produk -->
<?php if (isset($product)): ?>
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
    <div class="container mt-5">
        <div class="card shadow-sm">
            <div class="row g-0">
                <!-- Bagian Gambar Produk -->
                <div class="col-md-5">
                    <img src="<?= base_url('uploads/' . $product->imageUrl); ?>" class="img-fluid rounded-start" alt="<?= $product->productName; ?>" style="object-fit: cover; height: 100%; width: 100%;">
                </div>
                <!-- Bagian Detail Produk -->
                <div class="col-md-7">
                    <div class="card-body">
                        <h3 class="card-title fw-bold"><?= $product->productName; ?></h3>
                        <h4 class="text-primary fw-semibold">Rp <?= number_format($product->price, 0, ',', '.'); ?></h4>
                        <p class="card-text text-muted">Deskripsi: <?= $product->description; ?></p>
                        <!-- Form Tambah ke Keranjang -->
                        <form action="<?= site_url('index.php/carts/add'); ?>" method="post">
                            <input type="hidden" name="id" value="<?= $product->productId; ?>">
                            <input type="hidden" name="userid" value="<?= $this->session->userdata('userid'); ?>">
                            <div class="mb-3">
                                <label for="quantity" class="form-label">Jumlah</label>
                                <input type="text" class="form-control" id="quantity" name="quantity" value="1" min="1" max="99">
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Tambahkan ke Keranjang</button>
                        </form>
                        <!-- Tombol Kembali dan Order -->
                        <div class="mt-3 d-flex justify-content-between">
                            <a href="<?= site_url('index.php/'); ?>" class="btn btn-secondary">Kembali</a>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php endif; ?>
