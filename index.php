<?php
session_start();

// Check if product is coming or not
if (isset($_GET['pro_id'])) {
  $proid = $_GET['pro_id'];

  // If session cart is not empty
  if (!empty($_SESSION['cart'])) {

    // Using "array_column() function" we get the product id existing in session cart array
    $acol = array_column($_SESSION['cart'], 'pro_id');

    // now we compare whther id already exist with "in_array() function"
    if (in_array($proid, $acol)) {

      // Updating quantity if item already exist
      $_SESSION['cart'][$proid]['qty'] += 1;
    } else {
      // If item doesn't exist in session cart array, we add a new item
      $item = [
        'pro_id' => $_GET['pro_id'],
        'qty' => 1,
        'title' => $_GET['title'],
        'price' => $_GET['price']
      ];
      $_SESSION['cart'][$proid] = $item;
    }
  } else {
    // If cart is completely empty, then store item in session cart
    $item = [
        'pro_id' => $_GET['pro_id'],
        'qty' => 1,
        'title' => $_GET['title'],
        'price' => $_GET['price']
    ];
    $_SESSION['cart'][$proid] = $item;
  }
}
?>


<?php include 'header.php'; ?>

    <main>
      <div class="container">
        <h2 class="text-center my-3">Car Selection</h2>
        <div class="row">
          <?php
          // Read JSON file
          $json = file_get_contents('./data/cars.json');

          // Decode JSON
          $data = json_decode($json, true)['cars'];

          // Create an HTML page that displays the products with an "Add to Cart" button
          $counter = 0;
          foreach ($data as $item):
              $item['title'] = $item['brand'] . ' ' . $item['model'] . ' (' . $item['modelYear'] . ')';
              echo '<div class="col-sm-4">';
              echo '<div class="card border-0 ';
              if (!$item['availability']) {
                echo 'disabled';
              }
              echo '">';
              echo '<img class="" id="car-image" src="' . $item['image'] . '" />';
              echo '<div class="card-body">';
              echo '<p id="car-title">' . $item['brand'] . ' ' . $item['model'] . ' (' . $item['modelYear'] . ')</p>';
              echo '<p>Category: ' . $item['category'] . '</p>';
              echo '<p>Seat: ' . $item['seats'] . '</p>';
              echo '<p>Milage: ' . $item['milage'] . '</p>';
              echo '<p>Fuel Type: ' . $item['fuelType'] . '</p>';
              echo '<p>' . $item['description'] . '</p>';
              echo '<p id="car-price">Price/day: A$' . $item['pricePerDay'] . '</p>';
              echo '<br>';
              if (!$item['availability']) {
                echo '<span class="disabled-link">Add to Cart</span>';
              } else {
                  echo '<a href="' . 'index.php?pro_id=' . $item['id'] . '&title=' . urlencode($item['title']) . '&price=' . urlencode($item['pricePerDay']) . '" class="add-to-cart">Add to Cart</a>';
              }
              // echo '<a href="' . 'index.php?pro_id=' . $item['id'] . '&title=' . urlencode($item['title']) . '&price=' . urlencode($item['pricePerDay']) . '" class="add-to-cart">Add to Cart</a>';
              echo '</div>';
              echo '</div>';
              echo '</div>';

              $counter++;
              if ($counter % 3 == 0) {
                  echo '</div><div class="row">';
              }
            endforeach;
            ?>
        </div>
      </div>
    </main>

<?php include 'footer.php'; ?>