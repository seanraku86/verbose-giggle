<?php session_start(); ?>

<?php include 'header.php'; ?>


<div class="container">
    <h2 class="text-center my-3">Car Reservation</h2>
    <table class="table my-3">
        <a href="emptyCart.php" class="btn btn-sm btn-danger mt-2">Empty Cart</a>
        <thead>
        <tr class="text-center">
            <th>Item no.</th>
            <th>Vehicle</th>
            <th>Price Per Day</th>
            <th>Rental Days</th>
            <th colspan="2">Action</th>
        </tr>
        </thead>

        <tbody>
        <?php
        if (isset($_SESSION['cart'])) :
            $i = 1;
            foreach ($_SESSION['cart'] as $cart) :
        ?>
            <tr class="text-center">
                <td><?php echo $i; ?> # </td>
                <td><?= $cart['title']; ?></td>
                <td>A$<?= $cart['price']; ?></td>
                <td>
                <form action="updateCart.php" method="post">
                    <input type="number" value="<?= $cart['qty']; ?>" name="qty" min="1">
                    <input type="hidden" name="upid" value="<?= $cart['pro_id']; ?>">
                </td>
                <td>
                <input type="submit" name="update" value="Update" class="btn btn-sm btn-warning">
                </form>
                </td>
                <td><a class="btn btn-sm btn-danger" href="removeCartItem.php?id=<?= $cart['pro_id']; ?>">Remove</a></td>
            </tr>
        <?php
            $i++;
            endforeach;
        endif;
        ?>
        </tbody>
  </table>
</div>
<div class="text-center">
        <a href="index.php" class="btn btn-sm btn-primary">Back to Selection</a>
        <a href="checkout.php" class="btn btn-sm btn-success">Proceed to Checkout</a>
</div>


<?php include 'footer.php'; ?>