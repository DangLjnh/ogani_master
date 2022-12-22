<?php
class User
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
    $query = "SELECT * FROM user";
    $stmt = $this->conn->prepare($query);
    $stmt->execute();
    return $stmt;
  }

  public function create($name, $amount)
  {
    $queryStock = "INSERT INTO stock (name, amount) VALUES (:name, :amount)";
    $statementStock = $this->conn->prepare($queryStock);
    $statementStock->execute(array(
      ':name' => $name,
      ':amount' => $amount,
    ));
    $id = $this->conn->lastInsertId();
    return $id;
  }

  public function update($name, $stockID)
  {
    $queryStock = "UPDATE stock SET name=:name WHERE stockID=:stockID LIMIT 1";
    $stmt = $this->conn->prepare($queryStock);
    $stmt->execute(
      array(
        ':name' => $name,
        ':stockID' => $stockID,
      )
    );
    return $stmt;
  }

  public function delete($id)
  {
    $query = "DELETE FROM stock WHERE stockID=:id";
    $statement = $this->conn->prepare($query);
    $data = [
      ':id' => $id
    ];
    $statement->execute($data);
    return $statement;
  }
}