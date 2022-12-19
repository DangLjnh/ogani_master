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


  <?php include('../header/headerProduct.php'); ?>

  <div class="container">
    <div class="admin">
      <div class="contact__form__title">
        <h2>Admin</h2>
      </div>
      <a href="./adminProductCreate.php" class="btn btn-success">Add new product</a>
      <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Price</th>
            <th scope="col">Weight</th>
            <th scope="col">Vote</th>
            <th scope="col">Stock</th>
            <th scope="col">Image</th>
            <th scope="col">description</th>
            <th scope="col">Danh Mục</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $query = "SELECT * FROM product";
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
            <td><?= $row->price; ?></td>
            <td><?= $row->weight; ?></td>
            <td><?= $row->vote; ?></td>
            <td><?= $row->stockID; ?></td>
            <td>
              <img src="../<?= $row->photoURL; ?>" width='80' height='80' style="object-fit: cover;">
            </td>
            <td><?= $row->desc; ?></td>
            <td><?= $row->categoryID; ?></td>
 
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