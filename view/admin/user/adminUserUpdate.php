<?php
session_start();
include('../../../config/db.php');
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
  <link rel="stylesheet" href="../../../css/bootstrap.min.css" type="text/css">
  <link rel="stylesheet" href="../../../css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="../../../css/elegant-icons.css" type="text/css">
  <link rel="stylesheet" href="../../../css/nice-select.css" type="text/css">
  <link rel="stylesheet" href="../../../css/jquery-ui.min.css" type="text/css">
  <link rel="stylesheet" href="../../../css/owl.carousel.min.css" type="text/css">
  <link rel="stylesheet" href="../../../css/slicknav.min.css" type="text/css">
  <link rel="stylesheet" href="../../../css/style.css" type="text/css">
</head>

<body>
  <!-- Contact Form Begin -->
  <?php if (isset($_SESSION['message'])) : ?>
  <h5 class="alert alert-success"><?= $_SESSION['message']; ?></h5>
  <?php
    unset($_SESSION['message']);
  endif;
  ?>
  <?php
  if (isset($_GET['id'])) {
    $user_ID = $_GET['id'];

    $query = "SELECT * FROM user WHERE id=:id LIMIT 1";
    $statement = $conn->prepare($query);
    $data = [':id' => $user_ID];
    $statement->execute($data);

    $result = $statement->fetch(PDO::FETCH_OBJ); //PDO::FETCH_ASSOC
  }
  ?>

  <?php include('../header/headerUser.php'); ?>

  <div class="container">
    <form action="../../../controller/user/update.php" method="POST">
      <div class="modal-body row">
        <input type="hidden" name="id" value="<?= $result->id ?>" />
        <div class="form-group col-6">
          <div class="col-sm-12">
            <label for="text">Name: </label>
            <input type="text" value="<?= $result->name; ?>" name="name" class="form-control" placeholder="Enter name">
          </div>
        </div>
        <div class="form-group col-6">
          <div class="col-sm-12">
            <label for="email">Email</label>
            <input type="email" value="<?= $result->email; ?>" name="email" class="form-control"
              placeholder="Enter email">
          </div>
        </div>
        <div class="form-group col-6">
          <div class="col-sm-12">
            <label for="username">Username</label>
            <input type="text" value="<?= $result->username; ?>" name="username" class="form-control"
              placeholder="Enter text">
          </div>
        </div>
        <div class="form-group col-6">
          <div class="col-sm-12">
            <label for="phone">Phone</label>
            <input type="text" value="<?= $result->phone; ?>" name="phone" class="form-control"
              placeholder="Enter phone">
          </div>
        </div>
        <div class="form-group col-6">
          <div class="col-sm-12">
            <label for="address">Address</label>
            <input type="text" value="<?= $result->address; ?>" name="address" class="form-control"
              placeholder="Enter address">
          </div>
        </div>
      </div>
      <div class="text-center">
        <button type="submit" name="update_user_btn" class="btn btn-primary">Update user</button>
      </div>
    </form>
  </div>


  </div>
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