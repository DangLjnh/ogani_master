<?php
header('Content-Type: text/html; charset=utf-8');
$servername = "localhost";
$username = "root";
$password = "";
$database = "ogani_master";

try {
  $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // set the PDO error mode to exception
  $conn->query('set names utf8');
  // echo "Connected Successfully";

} catch (PDOException $e) {

  echo "Connection Failed" . $e->getMessage();
}