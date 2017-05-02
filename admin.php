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
      <p id="picCount">Displaying 1 to 6 of 8</p>
        <div id="gallery">
            <table id="thumbs">
                <tr>
                  <?php
                    $info = getUserInfo($conn, $email);
                    $id = $info['id'];
                    $dir = "/myndir" . "/*";
                    //get the list of all files with .jpg extension in the directory and safe it in an array named $myndir
                    $myndir = glob( $dir );
                    foreach ($myndir as $mynd) {
                      echo "<td><a href=\"" . $_SERVER['PHP_SELF'] . "?image=" . $mynd . "\"><img src=\"" . $mynd . "\"></a></td>";
                    }
                   ?>
                </tr>
            </table>
        </div>
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
    </div>
  </body>
</html>
