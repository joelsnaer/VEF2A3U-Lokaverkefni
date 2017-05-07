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
        $number = $id[0];
        $info = getDetails($conn, $number);
        $numberOfImages = imagesCount($conn, $number);
        $i = 0;
        $nuverandiSida = 0;
       ?>
       <p>Displaying all of your images</p>
        <div id="gallery">
            <table id="thumbs">
                  <?php
                  //print_r($info);
                    foreach ($info as $mynd) {
                      if ($i == 0) {
                        echo '<tr><td><img src="'. $mynd['thumbnailLink'].'"></td>';
                        $i++;
                      }
                      else if ($i == 3) {
                        echo '<td><img src="'. $mynd['thumbnailLink'].'"></td></tr>';
                        $i = 0;
                      }
                      else {
                          echo '<td><img src="'. $mynd['thumbnailLink'].'"></td>';
                          $i++;
                      }
                     }
                   ?>
            </table>
        </div>
    </div>
  </body>
</html>
