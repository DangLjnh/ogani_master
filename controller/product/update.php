<?php
session_start();
include('../../config/database.php');
include('../../model/Product.php');
include('../../model/Stock.php');
if (isset($_POST['update_product_btn'])) {
  $id = $_POST['id'];
  $name = $_POST['name'];
  $price = $_POST['price'];
  $weight = $_POST['weight'];
  $vote = $_POST['vote'];
  $description = $_POST['desc'];
  $stockID = $_POST['stockID'];
  $categoryID = $_POST['category_product'];
  $db = new db();
  $db->connect();
  $products = new Product($db);
  $stock = new Stock($db);

  $stock->update($name, $stockID);

  $filename = $_FILES['filess']['name'];
  $target_file = '../../uploads/' . $filename[0];
  $file_extension = pathinfo(
    $target_file,
    PATHINFO_EXTENSION
  );
  $file_extension = strtolower($file_extension);
  $valid_extension = array("png", "jpeg", "jpg");
  if (in_array($file_extension, $valid_extension)) {

    if (move_uploaded_file($_FILES['filess']['tmp_name'][0], $target_file)) {
      $products->update($id, $name, $price, $weight, $vote, $stockID, './uploads/' . $filename[0], $description, $categoryID);
      header('Location: ../../view/admin/product/adminProduct.php');
    }
  }
}