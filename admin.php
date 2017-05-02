<?php
  session_unset();
  session_start();
  if ($_SESSION['email']) {
  $email = $_SESSION['email'];
  }
  else {
    header('Location: index.php');
  }
?>

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
        $id = getId($conn, $email);
        $info = getDetails($conn, $id[0]);
        $numberOfImages = imagesCount($conn, $id[0]);
        $startRow = 0;
        $max = 6;
       ?>
       <p id="picCount">Displaying <?php echo $startRow+1;
                 if ($max < $numberOfImages[0]) {
                     echo ' to ';
                     if ($max < $numberOfImages[0]) {
                         echo $max;
                     } else {
                         echo $numberOfImages[0];
                     }
                 }
                 echo " of $numberOfImages[0]";
                 ?>
             </p>
        <div id="gallery">
            <table id="thumbs">
                <tr>
                  <?php
                    print_r($info);
                    foreach ($info['link'] as $result) {
                      
                    }
                   ?>
                </tr>
            </table>
        </div>
    <?php
    /*$name = saekjaNafn($conn, $email);
    echo "Velkomin " . $name["name"] . "<br>";
    echo "Email þitt er: " . $email . "<br>";

  if (!empty($_POST["nafn"])) {
      $nafn = $_POST["nafn"];
      breytaNafni($conn, $nafn, $email);
      header("Refresh:0");
    }*/
     ?>
     <!--<form method="post" action="admin.php">
       <input type="text" name="nafn" required>
       <input type="submit" value="Breyta nafni">
     </form>-->
    </div>
  </body>
</html>
