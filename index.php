<?php include('./controllers/login.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Todo List</title>
  <style>
    <?php include 'styles/login.css' ?>
  </style>
</head>

<body>
  <main id="main_login">
  <?php echo $username_password_incorrect_err; ?>
  <?php echo $username_does_not_exist_err; ?>
  <?php echo $empty_username_err; ?>
  <?php echo $empty_password_err; ?>
    <section id="login_container">
      <form action="" method="POST" id="user_login">
        <h1 id="login_title">Sign Up</h1>
        <div class='input-group'>
          <label for="txt_username">Username</label>
          <input type="text" id="txt_username" name="txt_username" required pattern="[a-zA-Z]+[a-zA-Z0-9_]+" />
        </div>
        <div class='input-group'>
          <label for="txt_password">Password</label>
          <input type="password" id="txt_password" name="txt_password" required pattern="^[a-zA-Z0-9@#&_]+" />
        </div>
        <button type='submit' name='btn_login' id="btn_login">
          Sign In
        </button>
      </form>
      <div id='back_link_container'>
        <a href='signup.php' id='back_link_register'>Register</a>
      </div>
    </section>
  </main>
</body>

</html>