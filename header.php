<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./style.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.2.0/fonts/remixicon.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Hertz-UTS</title>
</head>
<body>
    <header>
        <a href="index.php"><img id="logo" src="./img/website-logo.png" /></a>
        <h1 id="title">Hertz-UTS</h1>
        <a href="cart.php" class="cart"><i id="cart-icon" class="ri-shopping-cart-2-line"></i>
        <?php if (isset($_SESSION['cart'])) : ?>
            <?php echo count($_SESSION['cart']);; ?>
          <?php endif; ?>
        </a>
    </header>