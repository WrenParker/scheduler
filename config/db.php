<?php

class DatabaseConnection
{
  function __construct()
  {
    $this->host = "localhost";
    $this->user = "root";
    $this->pass = "";
    $this->database = "scheduler";
  }


  public function connect()
  {
    $conn = new mysqli($this->host, $this->user, $this->pass, $this->database);

    if($conn->connect_error) {
      die("Database Connection Failed: ". $conn->connect_error);
    }

    return $conn;
  }
}



 ?>
