<?php
session_start();
include('../../config/db.php');
if (isset($_POST['update_user_btn'])) {
  $id = $_POST['id'];
  $name = $_POST['name'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $username = $_POST['username'];
  $address = $_POST['address'];
  try {
    $query = "UPDATE user SET name=:name, email=:email, phone=:phone, username=:username, address=:address WHERE id=:id LIMIT 1";
    $statement = $conn->prepare($query);
    $data = [
      ':id' => $id,
      ':name' => $name,
      ':email' => $email,
      ':phone' => $phone,
      ':username' => $username,
      ':address' => $address,
    ];
    $query_execute = $statement->execute($data);
    print_r($query_execute);

    if ($query_execute) {
      $_SESSION['message'] = "Updated Successfully";
      header('Location: ../../view/admin/user/admin-user.php');
      exit(0);
    } else {
      $_SESSION['message'] = "Not Updated";
      header('Location: index.php');
      exit(0);
    }
  } catch (PDOException $e) {
    echo $e->getMessage();
  }
}