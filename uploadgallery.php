<?php
include 'connection.php';
include 'query.php';

use File\Upload;
if (isset($_POST['upload'])) {
    $destination = $_SERVER['DOCUMENT_ROOT'] . "/Lokaverkefni/myndir/";
    require_once 'file/upload.php';
    try {
        $loader = new Upload($destination);
        $loader->upload();
        $result = $loader->getMessages();
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
