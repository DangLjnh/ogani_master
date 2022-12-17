<?php
include('../config/db.php');
session_start();
if (isset($_POST['btn-login'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];

  //check already exist
  $querySingle = "SELECT * FROM user where username=:username";
  $dataSingle = [':username' => $username];
  $stmtSignle = $conn->prepare($querySingle);
  $stmtSignle->execute($dataSingle);
  $result = $stmtSignle->fetch(PDO::FETCH_OBJ); //PDO::FETCH_ASSOC

  //check account admin
  $queryAdmin = "SELECT * FROM admin where username=:username";
  $dataAdmin = [':username' => $username];
  $stmtAdmin = $conn->prepare($queryAdmin);
  $stmtAdmin->execute($dataAdmin);
  $resultAdmin = $stmtAdmin->fetch(PDO::FETCH_OBJ); //PDO::FETCH_ASSOC

  if ($resultAdmin) {
    $_SESSION['nameAdmin'] = $resultAdmin->name;
    header('Location: ../view/admin/user/admin-user.php');
    exit(0);
  } else {
    if ($result) {
      //check password
      if ($result->username == $username && $result->password == $password) {
        // $_SESSION['message'] = "Login successful!";
        $_SESSION['nameUser'] = $result->name;
        header('Location: ../index.php');
        exit(0);
      } else {
        $_SESSION['message'] = "Your password incorrect!";
        header('Location: ../view/login.php');
        exit(0);
      }
      exit(0);
    } else {
      $_SESSION['message'] = "Your username doesn't exist!";
      header('Location: ../view/login.php');
      exit(0);
    }
  }
}