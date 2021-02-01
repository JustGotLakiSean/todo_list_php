<?php
include('config/db.php');
$connection = new db();

global $username_does_not_exist_err, $password_incorrect_err, $username_password_incorrect_err, $empty_username_err, $empty_password_err, $err_count;

if(isset($_POST['btn_login']))
{
  // declare variables for user info that will be use later
  $uid = "";
  $firstname = "";
  $lastname = "";
  $username = "";
  $password = "";
  $_password = "";

  // collect form data and assign them to the post variables
  $post_username = $_POST['txt_username'];
  $post_password = $_POST['txt_password'];
  $con = $connection->getConnection();

  // escape special characters for SQL
  $uname = mysqli_real_escape_string($con, $post_username);
  $pswrd = mysqli_real_escape_string($con, $post_password);

  $sql = $connection->loginUser($uname, $pswrd);

  // Check if data form is empty
  if(!empty($post_username) && !empty($post_password))
  {
    $select_username_query = mysqli_query($con, "SELECT username FROM tbl_users WHERE username = '{$post_username}'");
    $check_username = mysqli_num_rows($select_username_query);

    // check if username registered
    if($check_username <= 0) // if not registered
    {
      $username_does_not_exist_err = '<div class="message_box">
      <p class="message">Username does not registered.</p>
      <p class="click_to_close">(Click to close)</p></div>';
    } else {
      // Fetch user data
      while($row = $sql->fetch_array(MYSQLI_ASSOC))
      {
        $uid = $row['uid'];
        $firstname = $row['userfname'];
        $lastname = $row['userlname'];
        $username = $row['username'];
        $_password = $row['userpass'];
      }

      // Verify password
      $password = password_verify($post_password, $_password);

      // check if both login form data are correct
      if($post_username === $username && $password)
      {
        header('location: ./task.php');
        session_start();
        $_SESSION['uid'] = $uid;
        $_SESSION['firstname'] = $firstname;
        $_SESSION['lastname'] = $lastname;
        $_SESSION['username'] = $username;
      } else { // if username, password are both wrong
        $username_password_incorrect_err = '<div class="message_box">
        <p class="message">Username or Password incorrect.</p>
        <p class="click_to_close">(Click to close)</p>
        </div>';
      }

    }
  } else {
    if(empty($post_username)){
      $empty_username_err = '<div class="message_box">
      <p class="message">Username field required</p>
      <p class="click_to_close">(Click to close)</p>
      </div>';
    }

    if(empty($post_password)){
      $empty_password_err = '<div class="message_box">
      <p class="message">Password field required</p>
      <p class="click_to_close">(Click to close)</p>
      </div>';
    }
  }
}

?>