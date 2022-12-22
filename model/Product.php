<?php
class Product
{
  private $conn;

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

  public function readSignle($id)
  {
    $query = "SELECT * FROM product where id=$id";
    $stmt = $this->conn->prepare($query);
    // 1 or 2 params http://localhost/test-php/controller/product/show.php?masp=2
    $stmt->bindParam(1, $this->masp); //find sp by masp
    $stmt->execute();
    return $stmt;
  }

  public function create($name, $price, $weight, $vote, $stockID, $file, $description, $categoryID)
  {
    $query = "INSERT INTO product (name, price, weight, vote ,stockID, photoURL, description, categoryID) VALUES (:name, :price,   :weight ,:vote,:stockID, :photoURL, :description, :categoryID)";
    $stmt = $this->conn->prepare($query);
    $data = new ProductModel($name, $price, $weight, $vote, $stockID, $file, $description, $categoryID);
    $stmt->execute((array)$data);
    return $stmt;
  }

  public function update($id, $name, $price, $weight, $vote, $stockID, $file, $description, $categoryID)
  {
    $query = "UPDATE product SET name=:name, price=:price, weight=:weight, vote=:vote ,stockID=:stockID , photoURL=:photoURL, description=:description, categoryID=:categoryID  WHERE id=:id LIMIT 1";
    $stmt = $this->conn->prepare($query);
    $data =
      $stmt->execute(
        array(
          ':id' => $id,
          ':name' => $name,
          ':price' => $price,
          ':vote' => $vote,
          ':weight' => $weight,
          ':stockID' => $stockID,
          ':photoURL' => $file,
          ':description' => $description,
          ':categoryID' => $categoryID,
        )
      );
    $stmt->execute($data);
    return $stmt;
  }

  public function delete($id)
  {
    $query = "DELETE FROM product WHERE id=:id";
    $statement = $this->conn->prepare($query);
    $data = [
      ':id' => $id
    ];
    $statement->execute($data);
    return $statement;
  }
}