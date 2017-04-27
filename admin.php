<?php
include 'connection.php';
include 'query.php';
 ?>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/admin.css">
    <title>Admin Svæði - Lokaverkefni</title>
  </head>
  <body>
    <div class="container">
      <ul class="navigator">
        <li><a href="logout.php">Log-out</a></li>
        <li><a href="uploadgallery.php">Upload to gallery</a></li>
      </ul>
    <?php
    session_unset();
    session_start();
    if ($_SESSION['email']) {
    $email = $_SESSION['email'];
    }
    else {
      header('Location: index.php');
    }
    $name = saekjaNafn($conn, $email);
    echo "Velkomin " . $name["name"] . "<br>";
    echo "Email þitt er: " . $email . "<br>";

  if (!empty($_POST["nafn"])) {
      $nafn = $_POST["nafn"];
      breytaNafni($conn, $nafn, $email);
      header("Refresh:0");
    }
     ?>
     <form method="post" action="admin.php">
       <input type="text" name="nafn" required>
       <input type="submit" value="Breyta nafni">
     </form>
     <?php
      /*$id = getID($conn, $name["name"], $email);
      $images = getImage($conn, $id[0]);
      foreach ($images as $image => $value) {
        echo '<img src="' . $value['link'] . '"><br>';
        echo '<a href="delete.php?link=' . $value['link'] . '&id=' . $id[0] . '"> Eyða</a><br>';
      }*/
      ?>
    </div>
  </body>
</html>
