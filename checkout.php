<?php session_start(); ?>

<?php include 'header.php'; ?>

<div class="container">
  <h2 class="text-center my-3">Checkout</h2>
  <form name="order-form" id="order-form" method="POST">
    <div class="form-group">
      <label for="name" class="required">Your Name:</label>
      <input type="text" name="fname" class="form-control order-fields" required>
    </div>
    <div class="form-group">
      <label for="email" class="required">Email:</label>
      <input type="email" name="email" id="email" class="form-control order-fields" required>
      <span id="email-check-text"></span>
    </div>
    <div class="form-group">
      <label for="address" class="required">Address:</label>
      <input type="text" name="address" class="form-control order-fields" required>
    </div>
    <div class="form-group">
      <label for="suburb" class="required">Suburb:</label>
      <input type="text" name="suburb" class="form-control order-fields" required>
    </div>
    <div class="form-group">
      <label for="state" class="required">State:</label>
      <input type="text" name="state" class="form-control order-fields" required>
    </div>
    <div class="form-group">
      <label for="payment" class="required">Payment Type:</label>
      <input type="text" name="payment" class="form-control order-fields" required>
    </div>
  </form>
  <div class="text-center">
    <a href="index.php" class="btn btn-sm btn-primary mr-2">Back to Selection</a>
    <button class="btn btn-sm btn-success" type="submit" form="order-form">Book</button>
  </div>

<?php
  $totalPrice = 0;
  foreach ($_SESSION['cart'] as $item) {
    $totalPrice += $item['price'] * $item['qty'];
  }
?>
    
<?php

include 'config.php';

?>

    <div class="text-center mt-3">
      <h4>Subtotal: A$<?php echo $totalPrice; ?></h4>
    </div>
</div>

<?php include 'footer.php'; ?>