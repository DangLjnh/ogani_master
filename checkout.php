<?php
session_start();
include('./config/db.php');

function showProducts()
{
  $total = 0;
  $countCart = 0;
  if (isset($_SESSION['cart'])) {
    for ($i = 0; $i < sizeof($_SESSION['cart']); $i++) {
      $total = $total + $_SESSION['cart'][$i][3] * $_SESSION['cart'][$i][4];
      $countCart += 1;
      echo '
      <li>' . $_SESSION['cart'][$i][1] . '<span>$' . $_SESSION['cart'][$i][3] * $_SESSION['cart'][$i][4] . '</span></li>
      ';
    }
  }
}

function showDataUser()
{
  if (isset($_SESSION['currentUser'])) {
    for ($i = 0; $i < sizeof($_SESSION['currentUser']); $i++) {
      echo '
      <div class="col-lg-8 col-md-6">
      <input type="hidden" name="id" value="' . $_SESSION['currentUser'][$i][0] . '"/>
              <div class="row">
                <div class="col-12">
                  <div class="checkout__input">
                    <p>Name<span>*</span></p>
                    <input type="text" name="name" value="' . $_SESSION['currentUser'][$i][1] . '"/>
                  </div>
                </div>
              </div>
              <div class="checkout__input">
                <p>Address<span>*</span></p>
                <input type="text" name="address" placeholder="Street Address" class="checkout__input__add" value="' . $_SESSION['currentUser'][$i][4] . '"/>
              </div>
              <div class="row">
                <div class="col-lg-6">
                  <div class="checkout__input">
                    <p>Phone<span>*</span></p>
                    <input type="text" name="phone" value="' . $_SESSION['currentUser'][$i][3] . '"/>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="checkout__input">
                    <p>Email<span>*</span></p>
                    <input type="email" name="email" value="' . $_SESSION['currentUser'][$i][2] . '"/>
                  </div>
                </div>
              </div>
            </div>
      ';
    }
  } else {
    echo '
      <div class="col-lg-8 col-md-6">
              <div class="row">
                <div class="col-12">
                  <div class="checkout__input">
                    <p>Name<span>*</span></p>
                    <input type="text" name="name"/>
                  </div>
                </div>
              </div>
              <div class="checkout__input">
                <p>Address<span>*</span></p>
                <input type="text" name="address" placeholder="Street Address" class="checkout__input__add" />
              </div>
              <div class="row">
                <div class="col-lg-6">
                  <div class="checkout__input">
                    <p>Phone<span>*</span></p>
                    <input type="text" name="phone" />
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="checkout__input">
                    <p>Email<span>*</span></p>
                    <input type="email" name="email" />
                  </div>
                </div>
              </div>
            </div>
      ';
  }
}

?>

<!DOCTYPE html>
<html lang="zxx">

<head>
  <meta charset="UTF-8" />
  <meta name="description" content="Ogani Template" />
  <meta name="keywords" content="Ogani, unica, creative, html" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title>Ogani | Template</title>

  <!-- Google Font -->
  <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet" />

  <!-- Css Styles -->
  <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css" />
  <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css" />
  <link rel="stylesheet" href="css/elegant-icons.css" type="text/css" />
  <link rel="stylesheet" href="css/nice-select.css" type="text/css" />
  <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css" />
  <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css" />
  <link rel="stylesheet" href="css/slicknav.min.css" type="text/css" />
  <link rel="stylesheet" href="css/style.css" type="text/css" />
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
      <a href="#"><img src="img/logo.png" alt="" /></a>
    </div>
    <div class="humberger__menu__cart">
      <ul>
        <li>
          <a href="#"><i class="fa fa-heart"></i> <span>1</span></a>
        </li>
        <li>
          <a href="#"><i class="fa fa-shopping-bag"></i> <span>3</span></a>
        </li>
      </ul>
      <div class="header__cart__price">item: <span>$150.00</span></div>
    </div>
    <div class="humberger__menu__widget">
      <div class="header__top__right__language">
        <img src="img/language.png" alt="" />
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
        <li>
          <a href="#">Pages</a>
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
  <!-- Header Section Begin -->
  <?php include('./include/header_index.php'); ?>
  <!-- Header Section End -->

  <!-- Hero Section Begin -->
  <!-- Hero Section End -->
  <!-- Hero Section End -->

  <!-- Breadcrumb Section Begin -->
  <section class="breadcrumb-section set-bg" data-setbg="img/breadcrumb.jpg">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <div class="breadcrumb__text">
            <h2>Checkout</h2>
            <div class="breadcrumb__option">
              <a href="./index.html">Home</a>
              <span>Checkout</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Breadcrumb Section End -->

  <!-- Checkout Section Begin -->
  <section class="checkout spad">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <h6>
            <span class="icon_tag_alt"></span> Have a coupon?
            <a href="#">Click here</a> to enter your code
          </h6>
        </div>
      </div>
      <div class="checkout__form">
        <h4>Billing Details</h4>
        <form action="./controller/checkout.php" method="POST">
          <div class="row">
            <?php showDataUser(); ?>
            <div class="col-lg-4 col-md-6">
              <div class="checkout__order">
                <h4>Your Order</h4>
                <div class="checkout__order__products">
                  Products <span>Total</span>
                </div>
                <ul>
                  <?php
                  showProducts();
                  ?>
                </ul>
                <div class="checkout__order__subtotal">
                  Subtotal <span>$<?= $_SESSION['total'] ?></span>
                </div>
                <div class="checkout__order__total">
                  Total <span>$<?= $_SESSION['total'] ?></span>
                </div>
                <button type="submit" name="checkout" class="site-btn">PLACE ORDER</button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </section>
  <!-- Checkout Section End -->

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