<?php
function newUser($conn, $name, $email, $password) {
    $statement = $conn->prepare("INSERT INTO user(name, email, password) VALUES (:name, :email, :password)");
    $statement->bindParam(':name', $name, PDO::PARAM_STR);
    $statement->bindParam(':email', $email, PDO::PARAM_STR);
    $statement->bindParam(':password', $password, PDO::PARAM_STR);
    $statement->execute();
}

function logIn($conn, $email, $password) {
  $statement = $conn->prepare("SELECT email, password FROM user WHERE email = :email AND password = :password");
  $statement->bindParam(':email', $email, PDO::PARAM_STR);
  $statement->bindParam(':password', $password, PDO::PARAM_STR);
  $statement->execute();
  $upplysingar = $statement->fetch();
  return $upplysingar;
}

function sessionStart($email) {
    session_unset();
    session_start();
    $_SESSION["email"] = $email;
    header('location: admin.php');
}

function saekjaNafn($conn, $email) {
  $statement = $conn->prepare("SELECT name FROM user WHERE email = :email");
  $statement->bindParam(':email', $email, PDO::PARAM_STR);
  $statement->execute();
  $upplysingar = $statement->fetch();
  return $upplysingar;
}

function breytaNafni($conn, $name, $email) {
  $statement = $conn->prepare("UPDATE user SET name = :name WHERE email = :email");
  $statement->bindParam(':name', $name, PDO::PARAM_STR);
  $statement->bindParam(':email', $email, PDO::PARAM_STR);
  $statement->execute();
}

function getID($conn, $email) {
  $statement = $conn->prepare("SELECT ID FROM user WHERE email = :email");
  $statement->bindParam(':email', $email, PDO::PARAM_STR);
  $statement->execute();
  $upplysingar = $statement->fetch();
  return $upplysingar;
}

function addImage($conn, $name, $link, $id) {
  $statement = $conn->prepare('INSERT INTO myndir(name, link, userid) VALUES (:name, :link, :id)');
  $statement->bindParam(':name', $name);
  $statement->bindParam(':link', $link);
  $statement->bindParam(':id', $id);
  $statement->execute();
}

function getDetails($conn, $id) {
  $statement = $conn->prepare("SELECT name, link FROM myndir WHERE userID = :id");
  $statement->bindParam(':id', $id);
  $statement->execute();
  $upplysingar = $statement->fetchAll();
  return $upplysingar;
}

function imagesCount($conn, $id) {
  $statement = $conn->prepare("SELECT COUNT(*) FROM myndir WHERE userID = :id");
  $statement->bindParam(':id', $id);
  $statement->execute();
  $upplysingar = $statement->fetch();
  return $upplysingar;
}
 ?>
