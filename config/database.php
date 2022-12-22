<?php

class db
{
  /* Properties */
  private $conn;
  private $dsn = 'mysql:dbname=ogani_master;host=localhost';
  private $user = 'root';
  private $password = '';
  /* Creates database connection */
  public

  function __construct()
  {
    try {
      $this->conn = new PDO($this->dsn, $this->user, $this->password);
    } catch (PDOException $e) {
      print "Error!: " . $e->getMessage() . "";
      die();
    }
    return $this->conn;
  }

  public function connect()
  {
    if ($this->conn instanceof PDO) {
      return $this->conn;
    }
  }
  public function lastInsertId()
  {
    return $this->conn->lastInsertId();
  }
}