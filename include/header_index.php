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
              <!-- <li><a href="./shop-grid.php">Shop</a></li> -->
              <li><a href="#">Pages</a>
                <ul class="header__menu__dropdown">
 
                  <li><a href="./shoping-cart.php">Shoping Cart</a></li>
 
                  <li><a href="./blog-details.php">Blog Details</a></li>
                </ul>
              </li>
              <li><a href="./blog.php">Blog</a></li>
              <li><a href="./contact.php">Contact</a></li>
            </ul>
          </nav>
        </div>
        <div class="col-lg-3">
          <div class="header__cart">
            <ul>
               
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