<?php
class UserModel
{
  public $conn;
  public $name;
  public $email;
  public $password;
  public $username;
  public $phone;
  public $address;

  public function __construct($uName, $uEmail, $uPassword, $uUsername, $uPhone, $uAddress)
  {
    $this->name = $uName;
    $this->email = $uEmail;
    $this->password = $uPassword;
    $this->username = $uUsername;
    $this->phone = $uPhone;
    $this->address = $uAddress;
  }
}