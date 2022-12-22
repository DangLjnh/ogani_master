<?php
class Product
{
  private $conn;
  public $id;
  public $name;
  public $price;
  public $weight;
  public $vote;
  public $stockID;
  public $photoURL;
  public $description;
  public $categoryID;

  //connect db
  function __construct()
  {
    $this->conn = new db();
    $this->conn = $this->conn->connect();
  }

  //read data
  public function read()
  {
    $query = "SELECT * FROM product";
    $stmt = $this->conn->prepare($query);
    $stmt->execute();
    return $stmt;
  }

  // public function readSignle()
  // {
  //   $query = "SELECT * FROM product where id=?";
  //   $stmt = $this->conn->prepare($query);
  //   // 1 or 2 params http://localhost/test-php/controller/product/show.php?masp=2
  //   $stmt->bindParam(1, $this->masp); //find sp by masp
  //   $stmt->execute();

  //   $row = $stmt->fetch(PDO::FETCH_ASSOC);

  //   $this->tensp = $row['tensp'];
  //   $this->gia = $row['gia'];
  //   $this->hinh = $row['hinh'];
  //   $this->maloai = $row['maloai'];
  // }
  // public function create()
  // {
  //   $query = "INSERT INTO sanpham (tensp, gia, hinh, maloai) VALUES (:tensp,:gia,:hinh,:maloai)";
  //   $stmt = $this->conn->prepare($query);
  //   $data = [
  //     ':tensp' => $this->tensp,
  //     ':gia' => $this->gia,
  //     ':hinh' => $this->hinh,
  //     ':maloai' => $this->maloai,
  //   ];
  //   $query_execute = $stmt->execute($data);
  //   if ($query_execute) {
  //     echo "success";
  //   } else {
  //     echo "fail";
  //     echo $stmt->error;
  //   }
  // }
}