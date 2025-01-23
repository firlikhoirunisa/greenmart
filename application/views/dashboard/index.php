<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <style>
        .dashboard-header {
            margin-bottom: 30px;
        }
        .product-card {
            margin-bottom: 20px;
        }
        .product-card img {
            max-height: 150px;
            object-fit: cover;
        }
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
        <div class="dashboard-header text-center">
            <h1 class="mb-3">Dashboard</h1>
            <div class="row">
                <div class="col-md-6">
                    <div class="card text-white bg-primary mb-3">
                        <div class="card-body text-center">
                            <h4>Total Keranjang</h4>
                            <h2><?= $carts_count; ?></h2>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card text-white bg-success mb-3">
                        <div class="card-body text-center">
                            <h4>Total Pesanan</h4>
                            <h2><?= $orders_count; ?></h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <h2 class="text-center mb-4">Daftar Produk</h2>
        <div class="row">
            <?php foreach ($products as $product): ?>
            <div class="col-md-3">
                <div class="card product-card">
                    <img src="<?= base_url('uploads/' . $product->imageUrl); ?>" class="card-img-top" alt="<?= $product->productName; ?>">
                    <div class="card-body text-center">
                        <h5 class="card-title"><?= $product->productName; ?></h5>
                        <p class="card-text">Rp.<?= number_format($product->price, 0, ',', '.'); ?></p>
                        <p class="card-text"><?= $product->description; ?></p>
                        <p class="card-text">Kategori : <?= $product->category; ?></p>
                        <p class="card-text">Stok : <?= $product->stock; ?></p>
                        <a href="<?= site_url('index.php/products/detail/'.$product->productId); ?>" class="btn btn-info btn-sm">Lihat Detail</a>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
