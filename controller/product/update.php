<?php
session_start();
include('../../config/db.php');
 
if (isset($_POST['update_product_btn'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $weight = $_POST['weight'];
    $vote = $_POST['vote'];
    $description = $_POST['desc'];
    $stockID = $_POST['stockID'];
    $categoryID = $_POST['category_product'];

 
    $queryStock = "UPDATE stock SET name=:name WHERE stockID=:stockID LIMIT 1";
    $statement = $conn->prepare($queryStock);
    $dataa = [
      ':name' => $name,
 
    ];
    $statement->execute(
        array(
          ':name' => $name,
          ':stockID' => $stockID,
        )
      );
  
    $query = "UPDATE product SET name=:name, price=:price, weight=:weight, vote=:vote ,stockID=:stockID ,   photoURL=:photoURL, description=:description, categoryID=:categoryID  WHERE id=:id LIMIT 1";
 
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
 
      if (move_uploaded_file($_FILES['filess']['tmp_name'][0], $target_file)) {
 
        $statement->execute(
 
          array(
            ':id' => $id,
            ':name' => $name,
            ':price' => $price,
            ':vote' => $vote,
            ':weight' => $weight,
            ':stockID' => $stockID,
            ':photoURL' => './uploads/' . $filename[0],
            ':description' => $description,
            ':categoryID' => $categoryID,
          )
        );
        header('Location: ../../view/admin/product/adminProduct.php');
      }
    }
 
}