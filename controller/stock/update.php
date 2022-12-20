<?php
session_start();
include('../../config/db.php');
if (isset($_POST['update_stock_btn'])) {
  $id = $_POST['id'];
  $amount = $_POST['amount'];
  try {
    $query = "UPDATE stock SET amount=:amount WHERE stockID=:id LIMIT 1";
    $statement = $conn->prepare($query);
    $data = [
      ':id' => $id,
      ':amount' => $amount,
    ];
    $query_execute = $statement->execute($data);
    if ($query_execute) {
      $_SESSION['message'] = "Updated Successfully";
      header('Location: ../../view/admin/stock/adminStock.php');
      exit(0);
    } else {
      $_SESSION['message'] = "Not Updated";
      header('Location: ../../view/admin/stock/adminStock.php');
      exit(0);
    }
  } catch (PDOException $e) {
    echo $e->getMessage();
  }
}