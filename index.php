<?php
include 'connection.php';
include 'query.php';
 ?>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/styles.css">
    <title>Log In - Lokaverkefni</title>
  </head>
  <body>
    <div class="container">
      <!--<ul>
        <li><a href="signup.php">Sign-up</a></li>
      </ul>-->
    <?php
    if (!empty($_POST["email"]) && !empty($_POST["password"])) {
      $email = $_POST["email"];
      $password = $_POST["password"];
      $passworden = hash('sha256', $password);
      $upplysingar = logIn($conn, $email, $passworden);
      sessionStart($upplysingar['email']);
    }
    ?>
      <h1>Log In</h1>
      <form method="post" action="index.php">
        <label>E-Mail:</label>
        <input name="email" type="email" required><br>
        <label>Password:</label>
        <input name="password" type="password" required><br>
        <input type="submit" value="Log In">
      </form>
        <a href="signup.php">Sign Up</a>
    </div>
  </body>
</html>
