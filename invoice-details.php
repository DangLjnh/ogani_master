<?php
include('./config/db.php');
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
    <!-- Header Section Begin -->
  <?php include('./include/header_index.php'); ?>
  <!-- Header Section End -->

  <!-- Hero Section Begin -->
  <?php include('./include/heroSecsion_index.php'); ?>
  <!-- Hero Section End -->
  <!-- Hero Section End -->

  <!-- Breadcrumb Section Begin -->
  <section class="breadcrumb-section set-bg" data-setbg="img/breadcrumb.jpg">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <div class="breadcrumb__text">
            <h2>Receipt Online</h2>
            <div class="breadcrumb__option">
              <a href="./index.php">Home</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Breadcrumb Section End -->

  <section class="my-5">
    <?php
    $orderID = $_GET["orderID"];
    $query = "SELECT * FROM orders WHERE orderID=:orderID";
    $statement = $conn->prepare($query);
    $data = [':orderID' => $orderID];
    $statement->execute($data);
    $statement->setFetchMode(PDO::FETCH_OBJ); //PDO::FETCH_ASSOC
    $result = $statement->fetchAll();
    if ($result) {
      foreach ($result as $row) {
    ?>
    <table cellspacing="0" style="border-collapse: collapse; padding: 40px; width: 100%;" width="100%">
      <tbody>
        <tr>
          <td width="5px" style="padding: 0;"></td>
          <td
            style="border: 1px solid #000; clear: both; display: block; margin: 0 auto; max-width: 600px; padding: 0;">
            <table width="100%" style="border-bottom: 1px solid #eee; border-collapse: collapse; color: #999;">
              <tbody>
                <tr>
                  <td width="50%" style="padding: 20px;"><strong
                      style="color: #333; font-size: 24px;">$<?= $row->total ?>
                    </strong>
                    Paid</td>
                  <td align="right" width="50%" style="padding: 20px;">Thanks <?= $row->name ?></td>
                </tr>
              </tbody>
            </table>
          </td>
          <td style="padding: 0;"></td>
          <td width="5px" style="padding: 0;"></td>
        </tr>
        <tr>
          <td width="5px" style="padding: 0;"></td>
          <td
            style="border: 1px solid #000; border-top: 0; clear: both; display: block; margin: 0 auto; max-width: 600px; padding: 0;">
            <table cellspacing="0"
              style="border-collapse: collapse; border-left: 1px solid #000; margin: 0 auto; max-width: 600px;">
              <tbody>
                <tr>
                  <td valign="top" style="padding: 20px;">
                    <h3 style="
                                            border-bottom: 1px solid #000;
                                            color: #000;
                                            font-family: 'Helvetica Neue', Helvetica, Arial, 'Lucida Grande', sans-serif;
                                            font-size: 18px;
                                            font-weight: bold;
                                            line-height: 1.2;
                                            margin: 0;
                                            margin-bottom: 15px;
                                            padding-bottom: 5px;
                                        ">
                      Summary
                    </h3>
                    <table cellspacing="0" style="border-collapse: collapse; margin-bottom: 40px;">
                      <tbody>
                        <tr>
                          <td style="padding: 5px 0;">Name</td>
                          <td align="right" style="padding: 5px 0;"><?= $row->name ?></td>
                        </tr>
                        <tr>
                          <td style="padding: 5px 0;">Email</td>
                          <td align="right" style="padding: 5px 0;"><?= $row->email ?></td>
                        </tr>
                        <tr>
                          <td style="padding: 5px 0;">Phone</td>
                          <td align="right" style="padding: 5px 0;"><?= $row->phone ?></td>
                        </tr>
                        <tr>
                          <td style="padding: 5px 0;">Address</td>
                          <td align="right" style="padding: 5px 0;"><?= $row->address ?></td>
                        </tr>
                        <tr>
                          <td style="padding: 5px 0;">Order date</td>
                          <td align="right" class="date" style="padding: 5px 0;"><?= $row->orderDate ?></td>
                        </tr>
                        <tr>
                          <td style="padding: 5px 0;">Delivery date</td>
                          <td align="right" class="date" style="padding: 5px 0;"><?= $row->deliveryDate ?></td>
                        </tr>
                        <tr>
                          <td
                            style="border-bottom: 2px solid #000; border-top: 2px solid #000; font-weight: bold; padding: 5px 0;">
                            Sign</td>
                          <td align="right"
                            style="border-bottom: 2px solid #000; border-top: 2px solid #000; font-weight: bold; padding: 5px 0;">
                            <?= $row->name ?></td>
                        </tr>
                      </tbody>
                    </table>
                  </td>
                </tr>
              </tbody>
            </table>
          </td>
          <td width="5px" style="padding: 0;"></td>
        </tr>


      </tbody>
    </table>
    <?php
      }
    } else {
      ?>
    <tr>
      <td colspan="5">No Record Found</td>
    </tr>
    <?php
    }
    ?>

  </section>

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

<script>
const date = document.querySelectorAll(".date")
date.forEach((item) => {
  item.textContent = item.textContent.slice(0, 10);
})
</script>