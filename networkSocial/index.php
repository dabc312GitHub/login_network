<?php
  session_start();

  require 'database.php';

  if(isset($_SESSION['user_id'])) {
    $records = $conn->prepare('SELECT id, email, password FROM users WHERE id = :id');
    $records->bindParam(':id', $_SESSION['user_id']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);
    $user = null;

    if( count($results) > 0 ) {
      $user = $results;
    }
  }
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title> Welcome to your App </title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
  </head>

  <body background = "wallpaper.jpg">

    <?php require 'partials/header.php' ?>

    <?php if (empty($user)): ?>

      <h1 style="color:white"> Please Login or SignUp </h1>

      <a href="login.php" style="color:white"> Login </a> 
      <a style="color:white"> or</a>
      <a href="signup.php" style="color:white"> SignUp </a>
      <br> <br>
      <img src="load_app.jpeg" style="width:32%"></img>

    <?php endif; ?>


  <body>
</html>
