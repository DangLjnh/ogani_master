<?php
session_start();
include('../../config/db.php');
include('../../model/UserModel.php');
if (isset($_POST['btn-register'])) {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $username = $_POST['username'];
  $phone = $_POST['phone'];
  $address = $_POST['address'];

  //check already exist
  $querySingle = "SELECT * FROM user where username=:username";
  $dataSingle = [':username' => $username];
  $stmtSignle = $conn->prepare($querySingle);
  $stmtSignle->execute($dataSingle);
  $result = $stmtSignle->fetch(PDO::FETCH_OBJ); //PDO::FETCH_ASSOC

  if ($result) {
    $_SESSION['message'] = "Username already exist!";
    header('Location: ../../view/register.php');
    exit(0);
  } else {
    $query = "INSERT INTO user (name, email, password, username, phone, address) VALUES (:name, :email, :password, :username, :phone, :address)";
    $stmt = $conn->prepare($query);

    $user = new UserModel($name, $email, $password, $username, $phone, $address);
    $query_execute = $stmt->execute((array)$user);

    if ($query_execute) {
      $_SESSION['message'] = "Register successful!";
      $_SESSION['nameUser'] = $name;
      header('Location: ../../index.php');
      exit(0);
    } else {
      $_SESSION['message'] = "Something wrong!";
      header('Location: ../../view/register.php');
      exit(0);
    }
  }
}