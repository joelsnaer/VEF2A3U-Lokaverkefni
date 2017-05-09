<?php
include 'connection.php';
include 'query.php';
 ?>
<html>
  <head>
    <meta charset="utf-8">
    <title>Sign Up - Verkefni 7</title>
    <link rel="stylesheet" href="css/styles.css">
  </head>
  <body>
    <div class="container">
      <ul class="navigator">
        <li><a href="index.php">Sign-in</a></li>
      </ul>
    <?php
      if (!empty($_POST["name"]) && !empty($_POST["email"]) && !empty($_POST["password"])) {
        $name = $_POST["name"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $passworden = hash('sha256', $password);
        if (saekjaNafn($conn, $email) ) {
          echo "Þetta email er í notkun";
        }
        else {

          newUser($conn, $name, $email, $passworden);
          $id = getID($conn, $name, $email);
          header('location: index.php');
        }
      }
    ?>
      <h1>Sign Up</h1>
      <form method="post" action="signup.php">
        <label>Name:</label>
        <input name="name" type="text" required><br>
        <label>E-Mail:</label>
        <input name="email" type="email" required><br>
        <label>Password:</label>
        <input name="password" type="password" required><br>
        <input type="submit" value="Sign up">
      </form>
    </div>
  </body>
</html>
