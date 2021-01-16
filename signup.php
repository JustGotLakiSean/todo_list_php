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
    <section id="registration_container">
      <header id="registration_header">
        <h1 id="registration_title">Sign Up</h1>
      </header>
      <form action="" method="POST" id="user_registration">
        <label for='txt_fname'>Firstname</label>
        <input type='text' name='txt_fname' id='txt_fname' pattern='[a-zA-Z]+[a-zA-Z ]' minlength='2' maxlength='26' required />
        <label for='txt_lname'>Lastname</label>
        <input type='text' name='txt_lname' id='txt_lname' pattern='[a-ZA-Z]+[a-zA-Z ]' minlength='2' maxlength='26' required />
        <label for='txt_username'>Username</label>
        <input type='text' name='txt_username' id='txt_username' pattern='[a-zA-Z]+[a-zA-Z0-9_]+' minlength='5' maxlength='15' required />
        <label for='txt_password'>Password</label>
        <input type='password' name='txt_password' id='txt_password' pattern='^[a-zA-Z0-9@#&_]+' minlength='8' maxlength='32' required />
        <input type='submit' name='btn_register' id="btn_register" value='Sign Up' />
      </form>
      <div>
        <a href='index.php'>Login</a>
      </div>
    </section>
  </main>
</body>

</html>