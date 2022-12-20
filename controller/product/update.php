<?php
session_start();
include('../../config/db.php');
 
if (isset($_POST['update_product_btn'])) {
 
    $name = $_POST['name'];
    $price = $_POST['price'];
    $weight = $_POST['weight'];
    $vote = $_POST['vote'];
    $description = $_POST['desc'];
    $categoryID = $_POST['category_product'];
  try {
    
  
    $query = "UPDATE product SET name=:name, price=:price, weight=:weight, vote=:vote,   photoURL=:photoURL, description=:description, categoryID=:categoryID  WHERE id=:id LIMIT 1";
 
    $statement = $conn->prepare($query);
    $filename = $_FILES['filess']['name'];
    // Location
    $target_file = '../../uploads/' . $filename[0];
    // file extension
    $file_extension = pathinfo(
      $target_file,
      PATHINFO_EXTENSION
    );
    $file_extension = strtolower($file_extension);
    // Valid image extension
    $valid_extension = array("png", "jpeg", "jpg");
    if (in_array($file_extension, $valid_extension)) {
      // Upload file
      if (move_uploaded_file($_FILES['filess']['tmp_name'][0], $target_file)) {
        // Execute query
        echo  $id;
        $statement->execute(
          // array($name, $target_file)
          array(
            ':id' => $id,
            ':name' => $name,
           ':price' => $price,
         ':vote' => $vote,
         ':weight' => $weight,
            ':photoURL' => './uploads/' . $filename[0],
            ':description' => $description,
          ':categoryID' => $categoryID,
          )
        );
        header('Location: ../../view/admin/product/adminProduct.php');
      }
    }
  } catch (PDOException $e) {
    echo $e->getMessage();
  }
}