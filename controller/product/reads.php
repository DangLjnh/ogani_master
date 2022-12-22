<?php

class ProductController
{
  function __construct()
  {
    // $this->conn = new db();
    // $this->conn = $this->conn->connect();
  }

  function readAll()
  {
    $db = new db();
    $db->connect();
    $products = new Product($db);
    $read = $products->read();
    $read->rowCount();
    $read->setFetchMode(PDO::FETCH_OBJ);
    $data = $read->fetchAll();
    return $data;
  }
}