<?php
session_start();
include('./config/db.php');
include('./config/database.php');
include('./model/Product.php');
$db = new db();
$db->connect();
$products = new Product($db);
function showStar($star)
{
  for ($i = 0; $i < 5; $i++) {
    if ($i < $star) {
      echo '<i class="fa fa-star"></i>';
    } else {
      echo '<i class="fa fa-star-o"></i>';
    }
  }
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
  <?php if (isset($_SESSION['message'])) : ?>
  <h5 class="alert alert-success"><?= $_SESSION['message']; ?></h5>
  <?php
    unset($_SESSION['message']);
  endif;
  ?>
  <?php
  if (isset($_GET['id'])) {
    $id = $_GET['id'];
    // $query = "SELECT * FROM product WHERE id=:id LIMIT 1";
    // $statement = $conn->prepare($query);
    // $data = [':id' => $id];
    // $statement->execute($data);
    $data = $products->readSignle($id);
    $result = $data->fetch(PDO::FETCH_OBJ);
  }
  ?>

  <!-- Page Preloder -->
  <div id="preloder">
    <div class="loader"></div>
  </div>

  <!-- Modal -->

  <?php
  if (isset($_GET['stock'])) {
    $stock = $_GET['stock'];
  }
  if (isset($_SESSION['stockProduct']) && $stock > 0) {
    echo '
          <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <h3>We dont have enough quantity ' . $result->name . ' right now!</h3>
          <p>We only have ' .  $_SESSION['stockProduct'] . ' products available!</p>
          <form action="./shoping-cart.php" method="POST">
            <input type="hidden" name="id" value="' . $result->id . '">
  <input type="hidden" name="name" value="' . $result->name . '">
  <input type="hidden" name="photoURL" value="' . $result->photoURL . '">
  <input type="hidden" name="price" value="' . $result->price . '">
  <input type="hidden" name="stockID" value="' . $result->stockID . '">
  <input type="hidden" name="amount" value="' . $stock . '">
  <button type="submit" class="btn btn-success" name="add-to-cart">Buy all products available!</button>
  </form>
  </div>
  <div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
  </div>
  </div>
  </div>
  </div>
  ';
  }

  if (isset($_SESSION['stockProduct']) && $stock == 0) {
    echo '
          <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <h3>Sorry! We sold out all :(</h3>
          <p>Please try again later!</p>
  </div>
  <div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
  </div>
  </div>
  </div>
  </div>
  ';
  }

  ?>


  <!-- Humberger Begin -->
  <div class="humberger__menu__overlay"></div>
  <div class="humberger__menu__wrapper">
    <div class="humberger__menu__logo">
      <a href="#"><img src="img/logo.png" alt=""></a>
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
  <!-- Hero Section End -->
  <!-- Hero Section End -->

  <!-- Breadcrumb Section Begin -->
  <section class="breadcrumb-section set-bg" data-setbg="img/breadcrumb.jpg">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <div class="breadcrumb__text">
            <h2><?= $result->name ?></h2>
            <div class="breadcrumb__option">
              <a href="./index.html">Home</a>
              <a href="./index.html">Vegetables</a>
              <span><?= $result->name ?></span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Breadcrumb Section End -->

  <!-- Product Details Section Begin -->
  <section class="product-details spad">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 col-md-6">
          <div class="product__details__pic">
            <div class="product__details__pic__item">
              <img class="product__details__pic__item--large" src="<?= $result->photoURL ?>" alt="">
            </div>
            <div class="product__details__pic__slider owl-carousel">
              <img data-imgbigurl="img/product/details/product-details-2.jpg" src="img/product/details/thumb-1.jpg"
                alt="">
              <img data-imgbigurl="img/product/details/product-details-3.jpg" src="img/product/details/thumb-2.jpg"
                alt="">
              <img data-imgbigurl="img/product/details/product-details-5.jpg" src="img/product/details/thumb-3.jpg"
                alt="">
              <img data-imgbigurl="img/product/details/product-details-4.jpg" src="img/product/details/thumb-4.jpg"
                alt="">
            </div>
          </div>
        </div>
        <form action="./shoping-cart.php" method="POST" class="col-lg-6 col-md-6">
          <div class="product__details__text">
            <h3><?= $result->name ?></h3>
            <div class="product__details__rating">
              <?php showStar($result->vote); ?>
              <span>(18 reviews)</span>
            </div>
            <div class="product__details__price">$<?= $result->price ?></div>
            <p><?= $result->description ?></p>
            <div class="product__details__quantity">
              <label for="text">Quantity: </label>
              <div class="quantity">
                <input type="number" name="amount" class="form-control" min="1" value="1">
              </div>
            </div>
            <input type="hidden" name="id" value="<?= $result->id; ?>">
            <input type="hidden" name="name" value="<?= $result->name; ?>">
            <input type="hidden" name="photoURL" value="<?= $result->photoURL ?>">
            <input type="hidden" name="price" value="<?= $result->price ?>">
            <input type="hidden" name="stockID" value="<?= $result->stockID ?>">
            <button type="submit" class="btn primary-btn" name="add-to-cart">ADD TO CARD</button>
            <a href="#" class="heart-icon"><span class="icon_heart_alt"></span></a>
            <ul>
              <?php
              $queryStock = "SELECT * FROM stock WHERE stockID=:stockID LIMIT 1";
              $statementStock = $conn->prepare($queryStock);
              $data = [':stockID' => $result->stockID];
              $statementStock->execute($data);
              $resultStock = $statementStock->fetch(PDO::FETCH_OBJ); //PDO::FETCH_ASSOC
              ?>
              <li><b>Availability</b> <span><?= $resultStock->amount ?></span></li>
              <li><b>Shipping</b> <span>01 day shipping. <samp>Free pickup today</samp></span></li>
              <li><b>Weight</b> <span><?= $result->weight ?> kg</span></li>
              <li><b>Share on</b>
                <div class="share">
                  <a href="#"><i class="fa fa-facebook"></i></a>
                  <a href="#"><i class="fa fa-twitter"></i></a>
                  <a href="#"><i class="fa fa-instagram"></i></a>
                  <a href="#"><i class="fa fa-pinterest"></i></a>
                </div>
              </li>
            </ul>
          </div>
        </form>
        <div class="col-lg-12">
          <div class="product__details__tab">
            <ul class="nav nav-tabs" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab"
                  aria-selected="true">Description</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab" aria-selected="false">Information</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#tabs-3" role="tab" aria-selected="false">Reviews
                  <span>(1)</span></a>
              </li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="tabs-1" role="tabpanel">
                <div class="product__details__tab__desc">
                  <h6>Products Infomation</h6>
                  <p>Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui.
                    Pellentesque in ipsum id orci porta dapibus. Proin eget tortor risus. Vivamus
                    suscipit tortor eget felis porttitor volutpat. Vestibulum ac diam sit amet quam
                    vehicula elementum sed sit amet dui. Donec rutrum congue leo eget malesuada.
                    Vivamus suscipit tortor eget felis porttitor volutpat. Curabitur arcu erat,
                    accumsan id imperdiet et, porttitor at sem. Praesent sapien massa, convallis a
                    pellentesque nec, egestas non nisi. Vestibulum ac diam sit amet quam vehicula
                    elementum sed sit amet dui. Vestibulum ante ipsum primis in faucibus orci luctus
                    et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam
                    vel, ullamcorper sit amet ligula. Proin eget tortor risus.</p>
                  <p>Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Lorem
                    ipsum dolor sit amet, consectetur adipiscing elit. Mauris blandit aliquet
                    elit, eget tincidunt nibh pulvinar a. Cras ultricies ligula sed magna dictum
                    porta. Cras ultricies ligula sed magna dictum porta. Sed porttitor lectus
                    nibh. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a.
                    Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Sed
                    porttitor lectus nibh. Vestibulum ac diam sit amet quam vehicula elementum
                    sed sit amet dui. Proin eget tortor risus.</p>
                </div>
              </div>
              <div class="tab-pane" id="tabs-2" role="tabpanel">
                <div class="product__details__tab__desc">
                  <h6>Products Infomation</h6>
                  <p>Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui.
                    Pellentesque in ipsum id orci porta dapibus. Proin eget tortor risus.
                    Vivamus suscipit tortor eget felis porttitor volutpat. Vestibulum ac diam
                    sit amet quam vehicula elementum sed sit amet dui. Donec rutrum congue leo
                    eget malesuada. Vivamus suscipit tortor eget felis porttitor volutpat.
                    Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Praesent
                    sapien massa, convallis a pellentesque nec, egestas non nisi. Vestibulum ac
                    diam sit amet quam vehicula elementum sed sit amet dui. Vestibulum ante
                    ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae;
                    Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula.
                    Proin eget tortor risus.</p>
                  <p>Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Lorem
                    ipsum dolor sit amet, consectetur adipiscing elit. Mauris blandit aliquet
                    elit, eget tincidunt nibh pulvinar a. Cras ultricies ligula sed magna dictum
                    porta. Cras ultricies ligula sed magna dictum porta. Sed porttitor lectus
                    nibh. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a.</p>
                </div>
              </div>
              <div class="tab-pane" id="tabs-3" role="tabpanel">
                <div class="product__details__tab__desc">
                  <h6>Products Infomation</h6>
                  <p>Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui.
                    Pellentesque in ipsum id orci porta dapibus. Proin eget tortor risus.
                    Vivamus suscipit tortor eget felis porttitor volutpat. Vestibulum ac diam
                    sit amet quam vehicula elementum sed sit amet dui. Donec rutrum congue leo
                    eget malesuada. Vivamus suscipit tortor eget felis porttitor volutpat.
                    Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Praesent
                    sapien massa, convallis a pellentesque nec, egestas non nisi. Vestibulum ac
                    diam sit amet quam vehicula elementum sed sit amet dui. Vestibulum ante
                    ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae;
                    Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula.
                    Proin eget tortor risus.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Product Details Section End -->

  <!-- Related Product Section Begin -->
  <section class="related-product">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="section-title related__product__title">
            <h2>Related Product</h2>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-3 col-md-4 col-sm-6">
          <div class="product__item">
            <div class="product__item__pic set-bg" data-setbg="img/product/product-1.jpg">
              <ul class="product__item__pic__hover">
                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
              </ul>
            </div>
            <div class="product__item__text">
              <h6><a href="#">Crab Pool Security</a></h6>
              <h5>$30.00</h5>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6">
          <div class="product__item">
            <div class="product__item__pic set-bg" data-setbg="img/product/product-2.jpg">
              <ul class="product__item__pic__hover">
                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
              </ul>
            </div>
            <div class="product__item__text">
              <h6><a href="#">Crab Pool Security</a></h6>
              <h5>$30.00</h5>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6">
          <div class="product__item">
            <div class="product__item__pic set-bg" data-setbg="img/product/product-3.jpg">
              <ul class="product__item__pic__hover">
                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
              </ul>
            </div>
            <div class="product__item__text">
              <h6><a href="#">Crab Pool Security</a></h6>
              <h5>$30.00</h5>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6">
          <div class="product__item">
            <div class="product__item__pic set-bg" data-setbg="img/product/product-7.jpg">
              <ul class="product__item__pic__hover">
                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
              </ul>
            </div>
            <div class="product__item__text">
              <h6><a href="#">Crab Pool Security</a></h6>
              <h5>$30.00</h5>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Related Product Section End -->

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

  <script type="text/javascript">
  $(window).on('load', function() {
    $('#myModal').modal('show');
  });
  </script>

</body>

</html>