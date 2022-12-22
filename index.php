<?php
session_start();
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

  <?php if (isset($_SESSION['message'])) : ?>
  <h5 class="alert alert-success"><?= $_SESSION['message']; ?></h5>
  <?php
    unset($_SESSION['message']);
  endif;
  ?>
  <!-- Humberger Begin -->
 
  <!-- Humberger End -->

  <!-- Header Section Begin -->
<<<<<<< HEAD
  <header class="header">
    <div class="header__top">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 col-md-6">
            <div class="header__top__left">
              <ul>
                <li><i class="fa fa-envelope"></i> phulinh@gmail.com</li>
                <li>Free Shipping for all Order of $99</li>
              </ul>
            </div>
          </div>
          <div class="col-lg-6 col-md-6">
            <div class="header__top__right">
              <div class="header__top__right__social">
                <a href="#"><i class="fa fa-facebook"></i></a>
                <a href="#"><i class="fa fa-twitter"></i></a>
                <a href="#"><i class="fa fa-linkedin"></i></a>
                <a href="#"><i class="fa fa-pinterest-p"></i></a>
              </div>
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
                <?php
                if (isset($_SESSION['nameUser'])) {
                ?>
                <div class="d-flex justify-content-center align-items-center gap-2">
                  <a href="#" class=""><?= $_SESSION['nameUser']; ?></a>
                  <a class="btn btn-warning ml-2" href="./controller/logout.php">Log out</a>
                </div>
                <?php
                } else {
                ?>
                <a href="view/login.php"><i class="fa fa-user"></i> Login</a>
                <?php
                }
                ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-lg-3">
          <div class="header__logo">
            <a href="./index.php"><img src="img/logo.png" alt=""></a>
          </div>
        </div>
        <div class="col-lg-6">
          <nav class="header__menu">
            <ul>
              <li class="active"><a href="./index.php">Home</a></li>
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
        </div>
        <div class="col-lg-3">
          <div class="header__cart">
            <ul>
              <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li>
              <li><a href="./shoping-cart.php"><i class="fa fa-shopping-bag"></i>
                  <span><?= isset($_SESSION['countCart']) ? $_SESSION['countCart'] : 0 ?></span></a></li>
            </ul>
          </div>
        </div>
      </div>
      <div class="humberger__open">
        <i class="fa fa-bars"></i>
      </div>
    </div>
  </header>
=======
  <?php include('./include/header_index.php'); ?>
>>>>>>> 4766dce1f3ca0f51b82126caf5e81be8486bd3ec
  <!-- Header Section End -->

  <!-- Hero Section Begin -->
  <?php include('./include/heroSecsion_index.php'); ?>
  <!-- Hero Section End -->

  <!-- Categories Section Begin -->
  <section class="categories">
    <div class="container">
      <div class="row">
        <div class="categories__slider owl-carousel">
          <?php
          $query = "SELECT * FROM category";
          $statement = $conn->prepare($query);
          $statement->execute();
          $statement->setFetchMode(PDO::FETCH_OBJ); //PDO::FETCH_ASSOC
          $result = $statement->fetchAll();
          if ($result) {
            foreach ($result as $row) {
          ?>
          <div class="col-lg-3">
            <div class="categories__item set-bg" data-setbg="<?= $row->photoURL ?>">
              <h5><a href="#">
                  <?= $row->name; ?>
                </a></h5>
            </div>
          </div>
          <?php
            }
          } else {
            ?>
          <div>No Record Found</div>
          <?php
          }
          ?>
        </div>
      </div>
    </div>
  </section>
  <!-- Categories Section End -->

  <!-- Featured Section Begin -->
  <section class="featured spad">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="section-title">
            <h2>Featured Product</h2>
          </div>
          <div class="featured__controls">
            <ul>
              <li class="active" data-filter="*">All</li>
              <!-- <li data-filter=".1">Fresh food</li>
              <li data-filter=".fresh-meat">Fresh Meat</li>
              <li data-filter=".vegetables">Vegetables</li>
              <li data-filter=".fastfood">Fastfood</li> -->
            </ul>
          </div>
        </div>
      </div>
      <div class="row featured__filter">
        <?php
        $query = "SELECT * FROM product";
        $statement = $conn->prepare($query);
        $statement->execute();
        $statement->setFetchMode(PDO::FETCH_OBJ); //PDO::FETCH_ASSOC
        $result = $statement->fetchAll();
        if ($result) {
          foreach ($result as $row) {
        ?>
        <div class="col-lg-3 col-md-4 col-sm-6 mix <?= $row->categoryID; ?>">
          <div class="featured__item">
            <div class="featured__item__pic set-bg" data-setbg="<?= $row->photoURL; ?>">
              <ul class="featured__item__pic__hover">
                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                <li><a href="./shop-details.php?id=<?= $row->id; ?>"><i class="fa fa-retweet"></i></a></li>
                <li>
                  <form action="./shoping-cart.php" method="POST">
                    <input type="hidden" name="id" value="<?= $row->id; ?>">
                    <input type="hidden" name="name" value="<?= $row->name; ?>">
                    <input type="hidden" name="photoURL" value="<?= $row->photoURL ?>">
                    <input type="hidden" name="price" value="<?= $row->price ?>">
                    <input type="hidden" name="stockID" value="<?= $row->stockID ?>">
                    <input type="hidden" name="amount" value="1">
                    <button type="submit" name="add-to-cart" style="border: none; background-color: unset;"><a><i
                          class="fa fa-shopping-cart"></i></a></button>
                  </form>
                </li>
              </ul>
            </div>
            <div class="featured__item__text">
              <h6><a href="#"><?= $row->name; ?></a></h6>
              <h5>$<?= $row->price; ?></h5>
            </div>
          </div>
        </div>
        <?php
          }
        } else {
          ?>
        <div>No Record Found</div>
        <?php
        }
        ?>
      </div>
    </div>
  </section>
  <!-- Featured Section End -->

  <!-- Banner Begin -->
  <div class="banner">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6">
          <div class="banner__pic">
            <img src="img/banner/banner-1.jpg" alt="">
          </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6">
          <div class="banner__pic">
            <img src="img/banner/banner-2.jpg" alt="">
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Banner End -->

  <!-- Latest Product Section Begin -->
  <!-- <section class="latest-product spad">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 col-md-6">
          <div class="latest-product__text">
            <h4>Latest Products</h4>
            <div class="latest-product__slider owl-carousel">
              <div class="latest-prdouct__slider__item">
                <a href="#" class="latest-product__item">
                  <div class="latest-product__item__pic">
                    <img src="img/latest-product/lp-1.jpg" alt="">
                  </div>
                  <div class="latest-product__item__text">
                    <h6>Crab Pool Security</h6>
                    <span>$30.00</span>
                  </div>
                </a>
                <a href="#" class="latest-product__item">
                  <div class="latest-product__item__pic">
                    <img src="img/latest-product/lp-2.jpg" alt="">
                  </div>
                  <div class="latest-product__item__text">
                    <h6>Crab Pool Security</h6>
                    <span>$30.00</span>
                  </div>
                </a>
                <a href="#" class="latest-product__item">
                  <div class="latest-product__item__pic">
                    <img src="img/latest-product/lp-3.jpg" alt="">
                  </div>
                  <div class="latest-product__item__text">
                    <h6>Crab Pool Security</h6>
                    <span>$30.00</span>
                  </div>
                </a>
              </div>
              <div class="latest-prdouct__slider__item">
                <a href="#" class="latest-product__item">
                  <div class="latest-product__item__pic">
                    <img src="img/latest-product/lp-1.jpg" alt="">
                  </div>
                  <div class="latest-product__item__text">
                    <h6>Crab Pool Security</h6>
                    <span>$30.00</span>
                  </div>
                </a>
                <a href="#" class="latest-product__item">
                  <div class="latest-product__item__pic">
                    <img src="img/latest-product/lp-2.jpg" alt="">
                  </div>
                  <div class="latest-product__item__text">
                    <h6>Crab Pool Security</h6>
                    <span>$30.00</span>
                  </div>
                </a>
                <a href="#" class="latest-product__item">
                  <div class="latest-product__item__pic">
                    <img src="img/latest-product/lp-3.jpg" alt="">
                  </div>
                  <div class="latest-product__item__text">
                    <h6>Crab Pool Security</h6>
                    <span>$30.00</span>
                  </div>
                </a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6">
          <div class="latest-product__text">
            <h4>Top Rated Products</h4>
            <div class="latest-product__slider owl-carousel">
              <div class="latest-prdouct__slider__item">
                <a href="#" class="latest-product__item">
                  <div class="latest-product__item__pic">
                    <img src="img/latest-product/lp-1.jpg" alt="">
                  </div>
                  <div class="latest-product__item__text">
                    <h6>Crab Pool Security</h6>
                    <span>$30.00</span>
                  </div>
                </a>
                <a href="#" class="latest-product__item">
                  <div class="latest-product__item__pic">
                    <img src="img/latest-product/lp-2.jpg" alt="">
                  </div>
                  <div class="latest-product__item__text">
                    <h6>Crab Pool Security</h6>
                    <span>$30.00</span>
                  </div>
                </a>
                <a href="#" class="latest-product__item">
                  <div class="latest-product__item__pic">
                    <img src="img/latest-product/lp-3.jpg" alt="">
                  </div>
                  <div class="latest-product__item__text">
                    <h6>Crab Pool Security</h6>
                    <span>$30.00</span>
                  </div>
                </a>
              </div>
              <div class="latest-prdouct__slider__item">
                <a href="#" class="latest-product__item">
                  <div class="latest-product__item__pic">
                    <img src="img/latest-product/lp-1.jpg" alt="">
                  </div>
                  <div class="latest-product__item__text">
                    <h6>Crab Pool Security</h6>
                    <span>$30.00</span>
                  </div>
                </a>
                <a href="#" class="latest-product__item">
                  <div class="latest-product__item__pic">
                    <img src="img/latest-product/lp-2.jpg" alt="">
                  </div>
                  <div class="latest-product__item__text">
                    <h6>Crab Pool Security</h6>
                    <span>$30.00</span>
                  </div>
                </a>
                <a href="#" class="latest-product__item">
                  <div class="latest-product__item__pic">
                    <img src="img/latest-product/lp-3.jpg" alt="">
                  </div>
                  <div class="latest-product__item__text">
                    <h6>Crab Pool Security</h6>
                    <span>$30.00</span>
                  </div>
                </a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6">
          <div class="latest-product__text">
            <h4>Review Products</h4>
            <div class="latest-product__slider owl-carousel">
              <div class="latest-prdouct__slider__item">
                <a href="#" class="latest-product__item">
                  <div class="latest-product__item__pic">
                    <img src="img/latest-product/lp-1.jpg" alt="">
                  </div>
                  <div class="latest-product__item__text">
                    <h6>Crab Pool Security</h6>
                    <span>$30.00</span>
                  </div>
                </a>
                <a href="#" class="latest-product__item">
                  <div class="latest-product__item__pic">
                    <img src="img/latest-product/lp-2.jpg" alt="">
                  </div>
                  <div class="latest-product__item__text">
                    <h6>Crab Pool Security</h6>
                    <span>$30.00</span>
                  </div>
                </a>
                <a href="#" class="latest-product__item">
                  <div class="latest-product__item__pic">
                    <img src="img/latest-product/lp-3.jpg" alt="">
                  </div>
                  <div class="latest-product__item__text">
                    <h6>Crab Pool Security</h6>
                    <span>$30.00</span>
                  </div>
                </a>
              </div>
              <div class="latest-prdouct__slider__item">
                <a href="#" class="latest-product__item">
                  <div class="latest-product__item__pic">
                    <img src="img/latest-product/lp-1.jpg" alt="">
                  </div>
                  <div class="latest-product__item__text">
                    <h6>Crab Pool Security</h6>
                    <span>$30.00</span>
                  </div>
                </a>
                <a href="#" class="latest-product__item">
                  <div class="latest-product__item__pic">
                    <img src="img/latest-product/lp-2.jpg" alt="">
                  </div>
                  <div class="latest-product__item__text">
                    <h6>Crab Pool Security</h6>
                    <span>$30.00</span>
                  </div>
                </a>
                <a href="#" class="latest-product__item">
                  <div class="latest-product__item__pic">
                    <img src="img/latest-product/lp-3.jpg" alt="">
                  </div>
                  <div class="latest-product__item__text">
                    <h6>Crab Pool Security</h6>
                    <span>$30.00</span>
                  </div>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section> -->
  <!-- Latest Product Section End -->

  <!-- Blog Section Begin -->
  <section class="from-blog spad">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="section-title from-blog__title">
            <h2>From The Blog</h2>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-6">
          <div class="blog__item">
            <div class="blog__item__pic">
              <img src="img/blog/blog-1.jpg" alt="">
            </div>
            <div class="blog__item__text">
              <ul>
                <li><i class="fa fa-calendar-o"></i> May 4,2019</li>
                <li><i class="fa fa-comment-o"></i> 5</li>
              </ul>
              <h5><a href="#">Cooking tips make cooking simple</a></h5>
              <p>Sed quia non numquam modi tempora indunt ut labore et dolore magnam aliquam quaerat </p>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-6">
          <div class="blog__item">
            <div class="blog__item__pic">
              <img src="img/blog/blog-2.jpg" alt="">
            </div>
            <div class="blog__item__text">
              <ul>
                <li><i class="fa fa-calendar-o"></i> May 4,2019</li>
                <li><i class="fa fa-comment-o"></i> 5</li>
              </ul>
              <h5><a href="#">6 ways to prepare breakfast for 30</a></h5>
              <p>Sed quia non numquam modi tempora indunt ut labore et dolore magnam aliquam quaerat </p>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-6">
          <div class="blog__item">
            <div class="blog__item__pic">
              <img src="img/blog/blog-3.jpg" alt="">
            </div>
            <div class="blog__item__text">
              <ul>
                <li><i class="fa fa-calendar-o"></i> May 4,2019</li>
                <li><i class="fa fa-comment-o"></i> 5</li>
              </ul>
              <h5><a href="#">Visit the clean farm in the US</a></h5>
              <p>Sed quia non numquam modi tempora indunt ut labore et dolore magnam aliquam quaerat </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Blog Section End -->

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