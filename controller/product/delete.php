<?php
session_start();
include('../../config/database.php');
include('../../model/Product.php');
include('../../model/Stock.php');
if (isset($_POST['delete_product'])) {
  $id = $_POST['delete_product'];
  $stockID = $_POST['stockID'];
  $db = new db();
  $db->connect();
  $products = new Product($db);
  $stock = new Stock($db);

  try {
    $query_execute =  $products->delete($id);
    $stock->delete($stockID);

    if ($query_execute) {
      $_SESSION['message'] = "Deleted Successfully";
      header('Location: ../../view/admin/product/adminProduct.php');
      exit(0);
    } else {
      $_SESSION['message'] = "Not Deleted";
      header('Location: ../../view/admin/product/adminProduct.php');
      exit(0);
    }
  } catch (PDOException $e) {
    echo $e->getMessage();
  }
}