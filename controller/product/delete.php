<?php
session_start();
include('../../config/db.php');

if (isset($_POST['delete_product'])) {
  $id = $_POST['delete_product'];

  try {
    $query = "DELETE FROM product WHERE id=:id";
    $statement = $conn->prepare($query);
    $data = [
      ':id' => $id
    ];
    $query_execute = $statement->execute($data);

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