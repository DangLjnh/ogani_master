<?php
session_start();
include('../../../config/db.php');
if (!$_SESSION['nameAdmin']) header('Location: ../../../index.php');
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


  <header class="header">
    <div class="container">
      <div class="row">
        <div class="col-lg-3">
          <div class="header__logo">
            <a href="./index.html"><img src="img/logo.png" alt=""></a>
          </div>
        </div>
        <div class="col-lg-6">
          <nav class="header__menu">
            <ul>
              <li class="active"><a href="./index.html">Users</a></li>
              <li><a href="./shop-grid.html">Shop</a></li>
              <li><a href="#">Pages</a>
              </li>
              <li><a href="./blog.html">Blog</a></li>
              <li><a href="./contact.html">Contact</a></li>
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
  <div class="container">
    <div class="admin">
      <div class="contact__form__title">
        <h2>Admin</h2>
      </div>
      <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Username</th>
            <th scope="col">Phone</th>
            <th scope="col">Address</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $query = "SELECT * FROM user";
          $statement = $conn->prepare($query);
          $statement->execute();

          $statement->setFetchMode(PDO::FETCH_OBJ); //PDO::FETCH_ASSOC
          $result = $statement->fetchAll();
          if ($result) {
            foreach ($result as $row) {
          ?>
          <tr>
            <td><?= $row->id; ?></td>
            <td><?= $row->name; ?></td>
            <td><?= $row->email; ?></td>
            <td><?= $row->username; ?></td>
            <td><?= $row->phone; ?></td>
            <td><?= $row->address; ?></td>
            <td class="d-flex align-items-center justify-content-center">
              <a href="./admin-user-update?id=<?= $row->id; ?>" class="btn btn-info btn-lg">Open</a>
              <form action="../../../controller/user/delete.php" method="POST">
                <button type="submit" name="delete_user" value="<?= $row->id; ?>"
                  class="btn btn-danger ml-2">Delete</button>
              </form>
            </td>
          </tr>
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
        </tbody>
      </table>
    </div>
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