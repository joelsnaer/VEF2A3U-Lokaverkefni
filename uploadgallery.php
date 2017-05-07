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
//Include-að öll file og notað namespace-in
include 'connection.php';
include 'query.php';

use File\Upload;
use File\Thumbnail;
use File\ThumbnailUpload;
?>



<?php
if (isset($_POST['upload'])) {
    require_once('file/thumbnailupload.php');
    try {
        $id = getId($conn, $email);
        $number = $id[0];
        $destination = $_SERVER['DOCUMENT_ROOT'] . "/Lokaverkefni/myndir/";
        $thumbnailDestination = $_SERVER['DOCUMENT_ROOT'] . "/Lokaverkefni/myndir/Thumbnail";
        $dest = "myndir/";
        $loader = new ThumbnailUpload($destination);
        $loader->setThumbDestination($thumbnailDestination);
        $loader->upload($number);
        $messages = $loader->getMessages();
        $newImageName = $number . "_" . $_FILES['image']['name'];
        $imageDestination = $dest . $newImageName;
        $thumbnailNameLink = $dest . "Thumbnail/" . $newImageName;
        addImage($conn, $_FILES['image']['name'], $imageDestination, $thumbnailNameLink, $number);
    } catch (Exception $e) {
        echo $e->getMessage();
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
      <div class="aligner">
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
    </div>
  </body>
</html>
