<?php
include('../../config/db.php');
include('../../model/CategoryModel.php');
if (isset($_POST['create_category_btn'])) {
  // Count total files
  // Prepared statement
  $name = $_POST['name'];
  $query = "INSERT INTO category (name,photoURL) VALUES(:name, :photoURL)";
  $statement = $conn->prepare($query);
  // File name
  $filename = $_FILES['files']['name'];
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
    if (move_uploaded_file($_FILES['files']['tmp_name'][0], $target_file)) {
      // Execute query
      $data = new CategoryModel($name, './uploads/' . $filename[0]);
      $statement->execute((array)$data);
      header('Location: ../../view/admin/category/adminCategory.php');
    }
  }
}