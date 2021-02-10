<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="styles.css">
</head>

<body>
  <form action="index.php" method="POST" autocomplete="off">
    <?php

    if (isset($_POST['username'])) {
      $username = $_POST['username'];
      $password = $_POST['password'];
      $email = $_POST['email'];

      $campos = array();

      if ($username == "") {
        array_push($campos, "The username field could not be empty");
      }

      if ($password == "" || strlen($password) < 6) {
        array_push($campos, "The Password field cannot be empty, or have less than 6 characters.");
      }

      if ($email == "" || strpos($email, "@") === false) {
        array_push($campos, "Please enter a valid email.");
      }

      if (count($campos) > 0) {
        echo "<div class='error'>";
        for ($i = 0; $i < count($campos); $i++) {
          echo "<li>" . $campos[$i] . "</i>";
        }
      } else {
        echo "<div class='correct'>
              Correct data";
      }
      echo "</div>";
    }
    ?>
    <div class='login'>
      <div class='login_title'>
        <span>Login to your account</span>
      </div>

      <div class='login_fields'>
        <div class='login_fields__user'>
          <div class='icon'>
            <img src='https://s3-us-west-2.amazonaws.com/s.cdpn.io/217233/user_icon_copy.png'>
          </div>
          <input placeholder='Username' type='text' name="username">
          <div class='validation'>
            <img src='https://s3-us-west-2.amazonaws.com/s.cdpn.io/217233/tick.png'>
          </div>
          </input>
        </div>
        <div class='login_fields__email'>
          <div class='icon'>
            <img src='https://s3-us-west-2.amazonaws.com/s.cdpn.io/217233/lock_icon_copy.png'>
          </div>
          <input placeholder='Email' type='email' name="email">
          <div class='validation'>
            <img src='https://s3-us-west-2.amazonaws.com/s.cdpn.io/217233/tick.png'>
          </div>
        </div>
        <div class='login_fields__password'>
          <div class='icon'>
            <img src='https://s3-us-west-2.amazonaws.com/s.cdpn.io/217233/lock_icon_copy.png'>
          </div>
          <input placeholder='Password' type='password' name="password">
          <div class='validation'>
            <img src='https://s3-us-west-2.amazonaws.com/s.cdpn.io/217233/tick.png'>
          </div>
        </div>

        <div class='login_fields__submit'>
          <input type='submit' value='Log In'>
          <div class='forgot'>
            <a href='#'>Forgotten password?</a>
          </div>
        </div>
      </div>
  </form>
</body>

</html>