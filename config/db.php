<?php
class db {
  private $host = 'localhost';
  private $username = 'root';
  private $password = '';
  private $db = 'todo_list_php';

  public function __construct()
  {
    $this->con = $this->getConnection();
  }

  public function getConnection()
  {
    $con = new \mysqli($this->host, $this->username, $this->password, $this->db);
    if(mysqli_connect_errno())
    {
      trigger_error("Database connection problem.");
    }

    $con->set_charset("utf8");
    return $con;
  }

}
?>