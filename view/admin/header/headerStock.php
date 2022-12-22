<header class="header">
  <div class="container">
    <div class="row">
      <div class="col-lg-3">
        <div class="header__logo">
          <!-- <a href="./index.html"><img src="img/logo.png" alt=""></a> -->
        </div>
      </div>
      <div class="col-lg-9">
        <nav class="header__menu">
          <ul>
            <li><a href="../user/adminUser.php">Users</a></li>
            <li><a href="../product/adminProduct.php">Products</a></li>
            <li><a href="../category/adminCategory.php">Categories</a></li>
            <li><a href="../oder/adminOder.php">Orders</a></li>
            <li class="active"><a href="../stock/adminStock.php">Stocks</a></li>
          </ul>
        </nav>
      </div>
    </div>
  </div>
  <div>
    <?php
    if (isset($_SESSION['nameAdmin'])) {
    ?>
    <div class="d-flex justify-content-center align-items-center gap-2">
      <a href="#" class=""><?= $_SESSION['nameAdmin']; ?></a>
      <a class="btn btn-warning ml-2" href="../../../controller/logout.php">Log out</a>
    </div>
    <?php
    } else {
    ?>
    <a href="view/login.php"><i class="fa fa-user"></i> Login</a>
    <?php
    }
    ?>
  </div>
</header>