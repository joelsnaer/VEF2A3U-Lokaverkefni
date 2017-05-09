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
    <link rel="stylesheet" href="css/gallery.css">
    <link href="css/lightbox.css" rel="stylesheet">
    <!--JQUERY Google CDN-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <!--JQUERY Microsoft CDN-->
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.1.1.min.js"></script>
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
                      //echo '<td><img src="'. $mynd['thumbnailLink'].'"></td>';
                      echo "<td><a href=\"" . "/Lokaverkefni/" . $mynd['link'] . "\" data-lightbox=myndir><img src=\"" . $mynd['thumbnailLink'] . "\"></a></td>";
                      $i++;
                     }
                   ?>
            </table>
        </div>
    </div>
    <script src="js/lightbox.js"></script>
  </body>
</html>
