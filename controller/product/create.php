<?php
include('../../config/db.php');
if (isset($_POST['create_product_btn'])) {
  $name = $_POST['name'];
  $price = $_POST['price'];
  $weight = $_POST['weight'];
  $vote = $_POST['vote'];
  $stockID = $_POST['stock'];
  $desc = $_POST['desc'];
  $categoryID = $_POST['category_product'];
  $query = "INSERT INTO product (name, price, weight, vote , photoURL, desc, categoryID) VALUES (?,?,?,?,?,?,?,?)";
  $statement = $conn->prepare($query);
  // File name
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
      $statement->execute(
        array($name,$price,$weight,$vote,$stockID, $target_file, $desc, $categoryID)
      );
      header('Location: ../../view/admin/product/adminProductphp');
      exit;
    }
  }

   
}