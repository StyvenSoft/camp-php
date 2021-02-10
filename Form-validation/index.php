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

    $username = "";
    $password = "";
    $email = "";
    $country = "";
    $level = "";

    if (isset($_POST['username'])) {
      $username = $_POST['username'];
      $password = $_POST['password'];
      $email = $_POST['email'];
      $country = $_POST['country'];

      $campos = array();

      if (isset($_POST['level'])) {
        $level = $_POST['level'];
      } else {
        $level = "";
      }

      if ($username == "") {
        array_push($campos, "The username field could not be empty");
      }

      if ($password == "" || strlen($password) < 6) {
        array_push($campos, "The Password field cannot be empty, or have less than 6 characters.");
      }

      if ($email == "" || strpos($email, "@") === false) {
        array_push($campos, "Please enter a valid email.");
      }

      if ($country == "") {
        array_push($campos, "Select a country");
      }

      if ($level == "") {
        array_push($campos, "Select an experience level");
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
          <input placeholder='Username' type='text' name="username" value="<?php echo $username; ?>">
          </input>
        </div>
        <div class='login_fields__email'>
          <div class='icon'>
            <img src='https://s3-us-west-2.amazonaws.com/s.cdpn.io/217233/lock_icon_copy.png'>
          </div>
          <input placeholder='Email' type='email' name="email" value="<?php echo $email; ?>">
        </div>
        <div class='login_fields__password'>
          <div class='icon'>
            <img src='https://s3-us-west-2.amazonaws.com/s.cdpn.io/217233/lock_icon_copy.png'>
          </div>
          <input placeholder='Password' type='password' name="password">
        </div>
        <div class='login_fields__country'>
          <div class='icon'>
            <img src='https://s3-us-west-2.amazonaws.com/s.cdpn.io/217233/user_icon_copy.png'>
          </div>
          <select name="country" id="">
            <option value="">Select Country</option>
            <option value="mx" <?php if($country == "mx") echo "selected" ?> >Mexico</option>
            <option value="eu" <?php if($country == "eu") echo "selected" ?> >United State</option>
            <option value="es" <?php if($country == "es") echo "selected" ?> >España</option>
            <option value="ar" <?php if($country == "ar") echo "selected" ?> >Argentina</option>
          </select>
        </div>
        <div class='login_fields__radio'>
          <input type='radio' name="level" value="beginner" <?php if($level == "beginner") echo "checked"; ?> > Beginner
          <input type='radio' name="level" value="intermediate" <?php if($level == "intermediate") echo "checked"; ?> > Intermediate
          <input type='radio' name="level" value="advance" <?php if($level == "advance") echo "checked"; ?> > Advance
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