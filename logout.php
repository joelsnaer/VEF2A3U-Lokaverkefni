<?php
//Eyðir session-inu, loggar út
session_start();
session_destroy();
header('Location: index.php');
?>
