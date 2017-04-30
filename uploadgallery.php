<?php
//Include-að öll file og notað namespace-in
include 'connection.php';
include 'query.php';

use File\Upload;
use File\Thumbnail;
use File\ThumbnailUpload;
?>

<?php
//Séð ef session virkar
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
if (isset($_POST['upload'])) {
    $destination = $_SERVER['DOCUMENT_ROOT'] . "/Lokaverkefni/myndir/";
    require_once 'file/upload.php';
    try {
        $id = getId($conn, $email);
        $number = $id[0];
        $loader = new Upload($destination);
        $loader->upload($number);
        $result = $loader->getMessages();
        addImage($conn, $destination, $number);
    } catch (Exception $e) {
        echo $e->getMessage();
    }
    require_once('file/thumbnail.php');
    try {
      $thumbnailDestination = $_SERVER['DOCUMENT_ROOT'] . "/Lokaverkefni/myndir/Thumbnail";
      $thumb = new Thumbnail($_POST['image']);
      $thumb->setDestination($thumbnailDestination);
      $thumb->setSuffix('small');
      $thumb->create();
    } catch (Exception $t) {
      echo $t->getMessage();
    }
}
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
        <li><a href="admin.php">Gallery</a></li>
      </ul>
      <form action="" method="post" enctype="multipart/form-data" id="uploadImage">
       <p>
         <label for="image">Upload image:</label>
         <input type="file" name="image" id="image">
       </p>
       <p>
         <input type="submit" name="upload" id="upload" value="Upload">
       </p>
     </form>
    </div>
  </body>
</html>
