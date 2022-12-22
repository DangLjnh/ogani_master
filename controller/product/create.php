<?php
include('../../config/db.php');
include('../../model/ProductModel.php');
include('../../config/database.php');
include('../../model/Product.php');
include('../../model/Stock.php');
if (isset($_POST['create_product_btn'])) {
  $name = $_POST['name'];
  $price = $_POST['price'];
  $weight = $_POST['weight'];
  $vote = $_POST['vote'];
  $description = $_POST['desc'];
  $categoryID = $_POST['category_product'];
  $db = new db();
  $db->connect();
  $stock = new Stock($db);
  //add stock and get stockID
  $stockID = $stock->create($name, 10);

  //add product
  $filename = $_FILES['filess']['name'];
  $target_file = '../../uploads/' . $filename[0];
  $file_extension = pathinfo(
    $target_file,
    PATHINFO_EXTENSION
  );
  $file_extension = strtolower($file_extension);
  $valid_extension = array("png", "jpeg", "jpg");

  if (in_array($file_extension, $valid_extension)) {
    // Upload file
    if (move_uploaded_file($_FILES['filess']['tmp_name'][0], $target_file)) {
      $products = new Product($db);
      $products->create($name, $price, $weight, $vote, $stockID, './uploads/' . $filename[0], $description, $categoryID);
      header('Location: ../../view/admin/product/adminProduct.php');
      exit;
    }
  }
}