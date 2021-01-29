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

  public function registerUser($username, $userpass, $userfname, $userlname)
  {
    $password_hash = password_hash($userpass, PASSWORD_BCRYPT);
    $con = $this->getConnection();
    $sql_query = "INSERT INTO tbl_users(username, userpass, userfname, userlname)
    VALUES('$username', '{$password_hash}', '{$userfname}', '{$userlname}')";
    $sql = $con->query($sql_query);
    if($sql){
      return true;
    } else {
      return mysqli_error($con);
    }
  }

  public function loginUser($username, $password)
  {
    $con = $this->getConnection();
    $sql_query = "SELECT username, userpass FROM tbl_users WHERE username = '{$username}' AND userpass = '{$password}'";
    $sql = $con->query($sql_query);
    if($sql)
    {
      return $sql;
    } else {
      return mysqli_error($con);
    }
  }

}
?>