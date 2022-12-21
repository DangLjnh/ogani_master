<?php
include('../config/db.php');
session_start();
if (isset($_POST['checkout'])) {
  $id = $_POST['id'];
  $name = $_POST['name'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $address = $_POST['address'];

  $query = "INSERT INTO orders (customerID,status, orderDate, deliveryDate,name, email, phone, address, total) VALUES (:customerID ,:status, :orderDate, :deliveryDate ,:name, :email, :phone, :address, :total)";
  $stmt = $conn->prepare($query);

  $data = array(
    ':customerID' => $id,
    ':status' => "PENDING",
    ':orderDate' => date("Y/m/d"),
    ':deliveryDate' => date("Y/m/d", strtotime('+2 day', time())),
    ':name' => $name,
    ':email' => $email,
    ':phone' => $phone,
    ':address' => $address,
    ':total' => $_SESSION['total'],
  );
  $stmt->execute($data);
  $orderID = $conn->lastInsertId();

  if (isset($_SESSION['cart'])) {
    // [$id, $name, $photoURL, $amount, $price];
    for ($i = 0; $i < sizeof($_SESSION['cart']); $i++) {
      print_r($_SESSION['cart']);
      $queryDetail = "INSERT INTO detail_order (orderID, productID, name, unit_price, amount, total) VALUES (:orderID, :productID, :name, :unit_price, :amount ,:total)";
      //add detail order
      $dataDetail = array(
        ':orderID' => $orderID,
        ':productID' => $_SESSION['cart'][$i][0],
        ':name' => $_SESSION['cart'][$i][1],
        ':unit_price' => $_SESSION['cart'][$i][4],
        ':amount' => $_SESSION['cart'][$i][3],
        ':total' => $_SESSION['cart'][$i][4] * $_SESSION['cart'][$i][3],
      );
      $stmtDetail = $conn->prepare($queryDetail);
      $stmtDetail->execute($dataDetail);

      //get stock
      $queryStock = "SELECT * FROM stock WHERE stockID=:stockID LIMIT 1";
      $dataStock =
        array(
          ':stockID' => $_SESSION['cart'][$i][5],
        );
      $stmtStock = $conn->prepare($queryStock);
      $stmtStock->execute($dataStock);
      $result = $stmtStock->fetch(PDO::FETCH_OBJ); //PDO::FETCH_ASSOC

      //update amount stock after buy
      $queryUpdateStock = "UPDATE stock SET amount=:amount WHERE stockID=:stockID LIMIT 1";
      $stmtUpdateStock = $conn->prepare($queryUpdateStock);
      $dataUpdateStock = [
        ':stockID' => $_SESSION['cart'][$i][5],
        ':amount' => $result->amount - $_SESSION['cart'][$i][3],
      ];
      $query_execute = $stmtUpdateStock->execute($dataUpdateStock);

      $_SESSION['message'] = "Order food successfully!";
      if ($_SESSION['cart']) unset($_SESSION['cart']);
      if ($_SESSION['total']) unset($_SESSION['total']);
      if ($_SESSION['countCart']) unset($_SESSION['countCart']);
      header("Location: ../invoice-details.php?orderID=$orderID");
    }
  }
}