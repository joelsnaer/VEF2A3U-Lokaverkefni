<?php
include 'connection.php';
include 'query.php';

$link = $_GET['link'];
$id = $_GET['id'];
deleteImage($conn, $id, $link);
header('location: admin.php');
 ?>
