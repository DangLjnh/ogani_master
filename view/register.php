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
            <h2>Register</h2>
          </div>
        </div>
      </div>
      <form action="../controller/user/create.php" method="POST"  id="form_register">
        <div class="row">
          <div class="col-lg-6 col-md-6">
            <input type="text" name="name" placeholder="Your name">
          </div>
          <div class="col-lg-6 col-md-6">
            <input type="text" name="email" placeholder="Your email">
          </div>
          <div class="col-lg-6 col-md-6">
            <input type="password" name="password" placeholder="Your password" id="pass">
          </div>
          <div class="col-lg-6 col-md-6">
            <input type="password" name="conf_password" placeholder="Confirm your password">
          </div>
          <div class="col-lg-6 col-md-6">
            <input type="text" name="username" placeholder="Your username">
          </div>
          <div class="col-lg-6 col-md-6">
            <input type="text" name="phone" placeholder="Your phone">
          </div>
          <div class="col-lg-6 col-md-6">
            <input type="text" name="address" placeholder="Your address">
          </div>
        </div>

        <p class="text-center">You have an account yet ? <a style="color: #7fad39 !important;" class="link-primary"
            href=" ./login.php">Log in now!</a></p>
            <p class="text-center"> back to home page <a style="color: #7fad39 !important;" class="link-primary"
            href="../index.php">home page</a></p>
        <div class="text-center">
          <button type="submit" name="btn-register" class="site-btn">Register</button>
        </div>
      </form>
    </div>
  </div>

  <!-- <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.nice-select.min.js"></script>
  <script src="js/jquery-ui.min.js"></script>
  <script src="js/jquery.slicknav.js"></script>
  <script src="js/mixitup.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/main.js"></script> -->
  <script src="http://code.jquery.com/jquery-3.4.1.min.js" 
    integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script type="text/javascript"
    src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.1/dist/jquery.validate.js"></script>
  <script src="../js/jquery_checkregister.js"></script>


</body>

</html>