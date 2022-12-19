<?php
session_start();
include('../../config/db.php');
if (isset($_POST['update_category_btn'])) {
  // Count total files
  // Prepared statement
  $name = $_POST['name'];
  $id = $_POST['id'];
  $query = "UPDATE category SET name=:name, photoURL=:photoURL WHERE categoryID=:id LIMIT 1";
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
      echo  $id;
      $statement->execute(
        // array($name, $target_file)
        array(
          ':id' => $id,
          ':name' => $name,
          ':photoURL' => $target_file,
        )
      );
      header('Location: ../../view/admin/category/adminCategory.php');
    }
  }
}