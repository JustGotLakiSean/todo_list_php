<?php include('./controllers/register.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign Up</title>
  <style>
    <?php include 'styles/register.css'; ?>
  </style>
</head>

<body>
  <main id="main_registration">
    <?php echo $username_already_exist_err; ?>
    <section id="registration_container">
      <form action="" method="POST" id="user_registration">
        <h1 id="registration_title">Sign Up</h1>
        <?php
        // keep the data to the textfield if there is an error if
        // the $err_count === 1
        if($err_count === 1){
          echo "<div class='input-group'>
          <label for='txt_fname'>Firstname</label>
          <input type='text' name='txt_fname' id='txt_fname' pattern='[a-zA-Z]+[a-zA-Z ]' minlength='2' maxlength='26' value=$r_firstname/>
        </div>
        <div class='input-group'>
          <label for='txt_lname'>Lastname</label>
          <input type='text' name='txt_lname' id='txt_lname' pattern='[a-ZA-Z]+[a-zA-Z ]' minlength='2' maxlength='26' value=$r_lastname />
        </div>
        <div class='input-group'>
          <label for='txt_username'>Username</label>
          <input type='text' name='txt_username' id='txt_username' pattern='[a-zA-Z]+[a-zA-Z0-9_]+' minlength='5' maxlength='15' value=$r_username />
        </div>
        <div class='input-group'>
          <label for='txt_password'>Password</label>
          <input type='password' name='txt_password' id='txt_password' pattern='^[a-zA-Z0-9@#&_]+' minlength='8' maxlength='32' required />
        </div>
        <button type='submit' name='btn_register' id='btn_register'>
          Sign Up
        </button>";
        } else if($err_count === 0){
          echo "<div class='input-group'>
          <label for='txt_fname'>Firstname</label>
          <input type='text' name='txt_fname' id='txt_fname' pattern='[a-zA-Z]+[a-zA-Z ]' minlength='2' maxlength='26' required />
        </div>
        <div class='input-group'>
          <label for='txt_lname'>Lastname</label>
          <input type='text' name='txt_lname' id='txt_lname' pattern='[a-ZA-Z]+[a-zA-Z ]' minlength='2' maxlength='26' required />
        </div>
        <div class='input-group'>
          <label for='txt_username'>Username</label>
          <input type='text' name='txt_username' id='txt_username' pattern='[a-zA-Z]+[a-zA-Z0-9_]+' minlength='5' maxlength='15' required />
        </div>
        <div class='input-group'>
          <label for='txt_password'>Password</label>
          <input type='password' name='txt_password' id='txt_password' pattern='^[a-zA-Z0-9@#&_]+' minlength='8' maxlength='32' required />
        </div>
        <button type='submit' name='btn_register' id='btn_register'>
          Sign Up
        </button>";
        }
        ?>
      </form>
      <div id="back_link_container">
        <a href='index.php' id="back_link_login">Sign In</a>
      </div>
    </section>
  </main>
</body>

</html>