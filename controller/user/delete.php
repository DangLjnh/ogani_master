<?php
session_start();
include('../../config/db.php');

if (isset($_POST['delete_user'])) {
  $id = $_POST['delete_user'];

  try {
    $query = "DELETE FROM user WHERE id=:id";
    $statement = $conn->prepare($query);
    $data = [
      ':id' => $id
    ];
    $query_execute = $statement->execute($data);

    if ($query_execute) {
      $_SESSION['message'] = "Deleted Successfully";
      header('Location: ../../view/admin/user/admin-user.php');
      exit(0);
    } else {
      $_SESSION['message'] = "Not Deleted";
      header('Location: ../../view/admin/user/admin-user.php');
      exit(0);
    }
  } catch (PDOException $e) {
    echo $e->getMessage();
  }
}