<?php
session_start();
include('./config/db.php');
if (!isset($_SESSION['cart'])) $_SESSION['cart'] = [];

//delete product in cart
if (isset($_GET['delID'])) {
  array_splice($_SESSION['cart'], $_GET['delID'], 1);
}

if (isset($_POST['add-to-cart'])) {
  $id = $_POST['id'];
  $name = $_POST['name'];
  $photoURL = $_POST['photoURL'];
  $amount = $_POST['amount'];
  $price = $_POST['price'];
  $stockID = $_POST['stockID'];
  $queryStock = "SELECT * FROM stock WHERE stockID=:stockID LIMIT 1";
  $statementStock = $conn->prepare($queryStock);
  $data = [':stockID' => $stockID];
  $statementStock->execute($data);
  $resultStock = $statementStock->fetch(PDO::FETCH_OBJ); //PDO::FETCH_ASSOC
  //check amount stock
  if ($amount > $resultStock->amount) {
    $_SESSION['stockProduct'] = $resultStock->amount;
    header("Location: ./shop-details.php?id=$id&stock=$resultStock->amount");
    $_SESSION['restProduct'] = $amount - $resultStock->amount;
  } else {
    //check already exist product in cart
    $checkExist = 0;
    unset($_SESSION['stockProduct']);
    for ($i = 0; $i < sizeof($_SESSION['cart']); $i++) {
      if ($_SESSION['cart'][$i][0] == $id) {
        $checkExist = 1;
        $newAmount = $amount + $_SESSION['cart'][$i][3];
        $_SESSION['cart'][$i][3] = $newAmount;
        break;
      }
    }
    if ($checkExist === 0) {
      //add new product
      $product = [$id, $name, $photoURL, $amount, $price, $stockID];
      $_SESSION['cart'][] = $product;
    }
  }

  //check cart empty
  if (count($_SESSION['cart']) == 0) {
    unset($_SESSION['total']);
    unset($_SESSION['countCart']);
  }
}

function showCart()
{
  $total = 0;
  $countCart = 0;
  if (isset($_SESSION['cart'])) {
    for ($i = 0; $i < sizeof($_SESSION['cart']); $i++) {
      $total = $total + $_SESSION['cart'][$i][3] * $_SESSION['cart'][$i][4];
      $countCart += 1;
      echo '
      <tr>
          <td class="shoping__cart__item">
            <img src="' . $_SESSION['cart'][$i][2] . '" alt="" width="100" height="100">
            <h5>' . $_SESSION['cart'][$i][1] . '</h5>
          </td>
          <td class="shoping__cart__price">
            $' . $_SESSION['cart'][$i][4] . '
          </td>
          <td class="shoping__cart__quantity shoping__cart__price">
            ' . $_SESSION['cart'][$i][3] . '
          </td>
          <td class="shoping__cart__total">
            $' . $_SESSION['cart'][$i][3] * $_SESSION['cart'][$i][4] . '
          </td>
          <td class="shoping__cart__item__close">
            <a href="shoping-cart.php?delID=' . $i . '">
              <span class="icon_close"></span>
            </a>
          </td>
        </tr>
      ';
    }
  }
  $_SESSION['total'] = $total;
  $_SESSION['countCart'] = $countCart;
}

?>
<!DOCTYPE html>
<html lang="zxx">

<head>
  <meta charset="UTF-8">
  <meta name="description" content="Ogani Template">
  <meta name="keywords" content="Ogani, unica, creative, html">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Ogani | Template</title>

  <!-- Google Font -->
  <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">

  <!-- Css Styles -->
  <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
  <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
  <link rel="stylesheet" href="css/nice-select.css" type="text/css">
  <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
  <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
  <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
  <link rel="stylesheet" href="css/style.css" type="text/css">
</head>

<body>
  <!-- Page Preloder -->
  <div id="preloder">
    <div class="loader"></div>
  </div>

  <!-- Humberger Begin -->
  <div class="humberger__menu__overlay"></div>
  <div class="humberger__menu__wrapper">
    <div class="humberger__menu__logo">
      <a href="./index.php"><img src="img/logo.png" alt=""></a>
    </div>
    <div class="humberger__menu__cart">
      <ul>
        <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li>
        <li><a href="#"><i class="fa fa-shopping-bag"></i> <span>3</span></a></li>
      </ul>
      <div class="header__cart__price">item: <span>$150.00</span></div>
    </div>
    <div class="humberger__menu__widget">
      <div class="header__top__right__language">
        <img src="img/language.png" alt="">
        <div>English</div>
        <span class="arrow_carrot-down"></span>
        <ul>
          <li><a href="#">Spanis</a></li>
          <li><a href="#">English</a></li>
        </ul>
      </div>
      <div class="header__top__right__auth">
        <a href="#"><i class="fa fa-user"></i> Login</a>
      </div>
    </div>
    <nav class="humberger__menu__nav mobile-menu">
      <ul>
        <li class="active"><a href="./index.html">Home</a></li>
        <li><a href="./shop-grid.html">Shop</a></li>
        <li><a href="#">Pages</a>
          <ul class="header__menu__dropdown">
            <li><a href="./shop-details.html">Shop Details</a></li>
            <li><a href="./shoping-cart.html">Shoping Cart</a></li>
            <li><a href="./checkout.html">Check Out</a></li>
            <li><a href="./blog-details.html">Blog Details</a></li>
          </ul>
        </li>
        <li><a href="./blog.html">Blog</a></li>
        <li><a href="./contact.html">Contact</a></li>
      </ul>
    </nav>
    <div id="mobile-menu-wrap"></div>
    <div class="header__top__right__social">
      <a href="#"><i class="fa fa-facebook"></i></a>
      <a href="#"><i class="fa fa-twitter"></i></a>
      <a href="#"><i class="fa fa-linkedin"></i></a>
      <a href="#"><i class="fa fa-pinterest-p"></i></a>
    </div>
    <div class="humberger__menu__contact">
      <ul>
        <li><i class="fa fa-envelope"></i> hello@colorlib.com</li>
        <li>Free Shipping for all Order of $99</li>
      </ul>
    </div>
  </div>
  <!-- Humberger End -->

  <!-- Header Section Begin -->

  <!-- Header Section End -->
  <?php include('./include/header_index.php'); ?>
  <!-- Header Section End -->

  <!-- Hero Section Begin -->
  <!-- <?php include('./include/heroSecsion_index.php'); ?> -->
  <!-- Hero Section Begin -->

  <!-- Hero Section End -->

  <!-- Breadcrumb Section Begin -->
  <section class="breadcrumb-section set-bg" data-setbg="img/breadcrumb.jpg">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <div class="breadcrumb__text">
            <h2>Shopping Cart</h2>
            <div class="breadcrumb__option">
              <a href="./index.html">Home</a>
              <span>Shopping Cart</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Breadcrumb Section End -->

  <!-- Shoping Cart Section Begin -->
  <section class="shoping-cart spad">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="shoping__cart__table">
            <table>
              <thead>
                <tr>
                  <th class="shoping__product">Products</th>
                  <th>Price</th>
                  <th>Quantity</th>
                  <th>Total</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <?php
                showCart();
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12">
          <div class="shoping__cart__btns">
            <a href="./index.php" class="primary-btn cart-btn">CONTINUE SHOPPING</a>
            <a href="#" class="primary-btn cart-btn cart-btn-right"><span class="icon_loading"></span>
              Upadate Cart</a>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="shoping__continue">
            <div class="shoping__discount">
              <h5>Discount Codes</h5>
              <form action="#">
                <input type="text" placeholder="Enter your coupon code">
                <button type="submit" class="site-btn">APPLY COUPON</button>
              </form>
            </div>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="shoping__checkout">
            <h5>Cart Total</h5>
            <ul>
              <li>Subtotal<span>$<?= $_SESSION['total'] ?></span></li>
              <li>Total <span>$<?= $_SESSION['total'] ?></span></li>
            </ul>
            <a href="./checkout.php" class="primary-btn">PROCEED TO CHECKOUT</a>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Shoping Cart Section End -->

  <!-- Footer Section Begin -->
  <?php include('./include/footer_index.php'); ?>
  <!-- Footer Section End -->

  <!-- Js Plugins -->
  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.nice-select.min.js"></script>
  <script src="js/jquery-ui.min.js"></script>
  <script src="js/jquery.slicknav.js"></script>
  <script src="js/mixitup.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/main.js"></script>


</body>

</html>