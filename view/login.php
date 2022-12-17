<?php
session_start();
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
  <link rel="stylesheet" href="../css/bootstrap.min.css" type="text/css">
  <link rel="stylesheet" href="../css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="../css/elegant-icons.css" type="text/css">
  <link rel="stylesheet" href="../css/nice-select.css" type="text/css">
  <link rel="stylesheet" href="../css/jquery-ui.min.css" type="text/css">
  <link rel="stylesheet" href="../css/owl.carousel.min.css" type="text/css">
  <link rel="stylesheet" href="../css/slicknav.min.css" type="text/css">
  <link rel="stylesheet" href="../css/style.css" type="text/css">
</head>

<body>
  <!-- Contact Form Begin -->
  <?php if (isset($_SESSION['message'])) : ?>
  <h5 class="alert alert-danger"><?= $_SESSION['message']; ?></h5>
  <?php
    unset($_SESSION['message']);
  endif;
  ?>

  <div class="contact-form spad">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="contact__form__title">
            <h2>Login</h2>
          </div>
        </div>
      </div>
      <form action="../controller/login.php" method="POST">
        <div class="row">
          <div class="col-lg-6 col-md-6">
            <input type="text" name="username" placeholder="Your username">
          </div>
          <div class="col-lg-6 col-md-6">
            <input type="password" name="password" placeholder="Your password">
          </div>
        </div>
        <p class="text-center">You doesn't have an account? <a style="color: #7fad39 !important;" class="link-primary"
            href=" ./register.php">Register now!</a></p>
        <div class="text-center">
          <button type="submit" name="btn-login" class="site-btn">Login</button>
        </div>
      </form>
    </div>
  </div>

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