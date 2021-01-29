<?php
include('config/db.php');
$connection = new db();

global $username_already_exist_err, $user_registration_success, $err_count;
$err_count = 0;

if(isset($_POST['btn_register'])){
  $txt_fname = $_POST['txt_fname'];
  $txt_lname = $_POST['txt_lname'];
  $txt_username = $_POST['txt_username'];
  $txt_password = $_POST['txt_password'];

  $con = $connection->getConnection();
  $username_check_query = "";
  $username_check = "";

  // declare variable for cleaning the inputs before storing to database
  $_firstname = "";
  $_lastname = "";
  $_username = "";
  $_password = "";

  // declare variables for the input data to retain then if there is an error
  $r_firstname = "";
  $r_lastname = "";
  $r_username = "";

  // assign mysqli_query
  $username_check_query = mysqli_query($con, "SELECT * FROM tbl_users WHERE username = '{$txt_username}'");
  $username_check = mysqli_num_rows($username_check_query);

  // check if form inputs are not empty
  if(!empty($txt_fname) && !empty($txt_lname) && !empty($txt_username) && !empty($txt_password)){
    // Check if username already exist
    // username checking
    if($username_check > 0){
      $err_count = 1;
      $username_already_exist_err = "<div>
      <p class='message'>Username already exist</p>
      <p class='click_to_close'>(Click to close)</p>
      </div>";
      $r_firstname = $txt_fname;
      $r_lastname = $txt_lname;
      $r_username = $txt_username;
    } else {
      $err_count = 0;
      $_firstname = mysqli_real_escape_string($con, $txt_fname);
      $_lastname = mysqli_real_escape_string($con, $txt_lname);
      $_username = mysqli_real_escape_string($con, $txt_username);
      $_password = mysqli_real_escape_string($con, $txt_password);

      $sql = $connection->registerUser($_username, $_password, ucwords($_firstname), ucwords($_lastname));
      if($sql){
        $user_registration_success = '<div class="message_box" onclick="this.style.display = \'none\';">
      <p class="message">User registration success.</p>
      <p class="click_to_close">(Click to close)</p>
      </div>';
        header('location: ./success_register.php');
        // exit();
      } else {
        printf("%s\n", $connection->error);
      }
    }
  }
}
