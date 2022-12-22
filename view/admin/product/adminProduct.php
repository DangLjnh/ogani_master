<?php
session_start();
include('../../../config/database.php');
include('../../../model/Product.php');
include('../../../model/Category.php');
if (!$_SESSION['nameAdmin']) header('Location: ../../../index.php');

$db = new db();
$db->connect();
$products = new Product($db);
$categories = new Category($db);
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
          $read = $products->read();
          $read->setFetchMode(PDO::FETCH_OBJ);
          $data = $read->fetchAll();
          if ($data) {
            foreach ($data as $row) {
          ?>
          <tr>
            <td><?= $row->id; ?></td>
            <td><?= $row->name; ?></td>
            <td>$<?= number_format($row->price, 0, '', '.') ?></td>
            <td><?= number_format($row->weight, 0, '', '.') ?> kg</td>
            <td><?= $row->vote; ?></td>
            <td><?= $row->stockID; ?></td>
            <td>
              <img src="../../.<?= $row->photoURL; ?>" width='80' height='80' style="object-fit: cover;">
            </td>
            <td class="description"><?= $row->description; ?></td>
            <?php
                $data = $categories->readSignle($row->categoryID);
                $result = $data->fetch(PDO::FETCH_OBJ);
                ?>
            <td><?= $result->name; ?></td>
            <td>
              <a href="./adminProductUpdate.php?id=<?= $row->id; ?>" class="btn btn-warning ">Edit</a>
              <form action="../../../controller/product/delete.php" method="POST">
                <input type="hidden" name="stockID" value="<?= $row->stockID; ?>">
                <button type="submit" name="delete_product" value="<?= $row->id; ?>"
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

  <!-- <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.nice-select.min.js"></script>
  <script src="js/jquery-ui.min.js"></script>
  <script src="js/jquery.slicknav.js"></script>
  <script src="js/mixitup.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/main.js"></script> -->

  <script>
  const description = document.querySelectorAll(".description")
  description.forEach((item) => {
    item.textContent = item.textContent.slice(0, 100) + " ..."
  })
  </script>


</body>

</html>