<?php
class Category
{
  private $conn;

  //connect db
  function __construct()
  {
    $this->conn = new db();
    $this->conn = $this->conn->connect();
  }

  public function read()
  {
    $query = "SELECT * FROM category";
    $stmt = $this->conn->prepare($query);
    $stmt->execute();
    return $stmt;
  }

  public function readSignle($id)
  {
    $query = "SELECT * FROM category WHERE categoryID=$id";
    $stmt = $this->conn->prepare($query);
    $stmt->execute();
    return $stmt;
  }
}