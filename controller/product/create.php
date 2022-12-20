<?php
include('../../config/db.php');
include('../../model/ProductModel.php');
if (isset($_POST['create_product_btn'])) {
  $name = $_POST['name'];
  $price = $_POST['price'];
  $weight = $_POST['weight'];
  $vote = $_POST['vote'];
  $description = $_POST['desc'];
  $categoryID = $_POST['category_product'];

  //add stock
  $queryStock = "INSERT INTO stock (name, amount) VALUES (:name, :amount)";
  $statementStock = $conn->prepare($queryStock);
  $query_execute = $statementStock->execute(array(
    ':name' => $name,
    ':amount' => 10,
  ));

  //get id stock 
  $stockID = $conn->lastInsertId();

  //add product
  $query = "INSERT INTO product (name, price, weight, vote ,stockID, photoURL, description, categoryID) VALUES (:name, :price, :vote, :weight ,:stockID, :photoURL, :description, :categoryID)";
  $statement = $conn->prepare($query);
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
      $datas = new ProductModel($name, $price, $weight, $vote, $stockID, './uploads/' . $filename[0], $description, $categoryID);
      $statement->execute((array)$datas);
      // Execute query
      // $data = [
      //   ':name' => $name,
      //   ':price' => $price,
      //   ':vote' => $vote,
      //   ':weight' => $weight,
      //   ':stockID' => $stockID,
      //   ':photoURL' => './uploads/' . $filename[0],
      //   ':description' => $description,
      //   ':categoryID' => $categoryID,
      // ];
      // $statement->execute(
      //   $data
      // );
      header('Location: ../../view/admin/product/adminProduct.php');
      exit;
    }
  }
}