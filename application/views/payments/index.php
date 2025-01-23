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
  <div class="container my-5">
   <h2 class="text-center mb-4">
    Shopping Cart
   </h2>
   <div class="row">
    <div class="col-lg-8">
     <table class="table table-bordered cart-table">
      <thead>
       <tr>
        <th>
         PRODUK
        </th>
        <th>
         HARGA
        </th>
        <th>
         JUMLAH
        </th>
        <th>
         SUBTOTAL
        </th>
       </tr>
      </thead>
      <tbody>
        <?php if (isset($orders)):?>
       <tr>
        <td>
         <img alt="Image of Tomat Merah" height="50" src="<?php echo site_url('uploads/'.$orders->imageUrl);?>" width="50"/>
         <?= $orders->productName ;?>
        </td>
        <td>
         <?= $orders->price ;?>
        </td>
        <td>
         <input type="number" name="jumlah_pesan" value="1"/>   
        </td>
        <td>
         Rp. <?= $orders->price ;?>
        </td>
        
       </tr>
        <?php endif; ?>

        
      </tbody>
     </table>
     <div class="d-flex justify-content-between">
      <!-- <button class="btn btn-light">
       Return to shop
      </button> -->
      <button class="btn btn-light">
       Update Cart
      </button>
      </form>
     </div>
     <div class="mt-4">
      <label class="form-label" for="voucher">
       Kode Voucher:
      </label>
      <div class="input-group">
       <input class="form-control" id="voucher" placeholder="Enter code" type="text"/>
       <button class="btn btn-outline-secondary" type="button">
        Apply Coupon
       </button>
      </div>
     </div>
    </div>
    <div class="col-lg-4">
     <div class="cart-total">
      <h5>
       Cart Total
      </h5>
      
      <!-- (
            [orderId] => 1
            [userId] => 1
            [totalAmount] => 20000.00
            [orderStatus] => Pending
            [orderDate] => 2023-01-01 12:00:00
            [paymentId] => 2
            [paymentMethod] => Bank Transfer
            [paymentStatus] => Paid
            [paymentDate] => 2025-01-23 11:45:41
        ) -->
        <form action="<?php echo site_url('index.php/payments/add_payment'); ?>" method="post">
    <div class="mb-3">
        <!-- Input Hidden untuk User ID -->
        <input type="hidden" name="userid" value="<?php echo $this->session->userdata('userid'); ?>">
        <!-- Input Hidden untuk Order ID -->
        <input type="hidden" name="orderId" value="<?php echo $orders->orderId; ?>">

        <!-- Input Hidden untuk Status Pesanan -->
        <input type="hidden" name="orderStatus" value="<?php echo $orders->orderStatus; ?>">

        <!-- Total Harga -->
        <label class="form-label" for="total">Total:</label>
        <input class="form-control" name="total" id="total" type="text" value="Rp. <?php echo $orders->totalAmount; ?>" readonly>

        <!-- Metode Pembayaran -->
        <label class="form-label mt-3">Metode Pembayaran:</label>
        <div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="paymentMethod" id="bankTransfer" value="Bank Transfer" required>
                <label class="form-check-label" for="bankTransfer">Bank Transfer</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="paymentMethod" id="creditCard" value="Credit Card" required>
                <label class="form-check-label" for="creditCard">Credit Card</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="paymentMethod" id="cod" value="Cash on Delivery" required>
                <label class="form-check-label" for="cod">Cash on Delivery (COD)</label>
            </div>
        </div>
    </div>

    <!-- Informasi Pengiriman -->
    <div class="mt-3">
        <span><strong>Pengiriman:</strong></span>
        <span>Gratis</span>
    </div>

    <!-- Tombol Submit -->
    <button type="submit" class="btn btn-success w-100 mt-3">Proceed to Checkout</button>
</form>


   </div>
  </div>
  <footer class="text-center mt-5">
   <a class="footer-link" href="#">
    Kembali ke halaman utama
   </a>
  </footer>
  <script crossorigin="anonymous" integrity="sha384-oBqDVmMz4fnFO9gybBogGz1U5aUOHQ8D2k6eieG2m2zF8I5GFjz9Pp2F5pV2QpVI" src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js">
  </script>
  <script crossorigin="anonymous" integrity="sha384-pZjw8f+ua7Kw1TIq5tvbLrQik2hbOdh6g9tZ9l+Y5n3e1r5+8nb7+Yh5y5NowJo+" src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js">
  </script>
 </body>
</html>
