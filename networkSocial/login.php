<?php
  session_start();

  if(isset($_SESSION['id'])) {
    header('Location: /laicos_der');
  }
  
  require 'database.php';

  if( !empty($_POST['email']) && !empty($_POST['password']) ) {
    $records = $conn->prepare('SELECT id, email, password FROM users WHERE email = :email');
    $records->bindParam(':email', $_POST['email']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);
    

    $message = '';

    if( count($results) > 0 && password_verify($_POST['password'], $results['password']) ) {
      $_SESSION['user_id'] = $results['id'];
      //header('Location: /laicos_der');
      header('Location: /laicos_der/OwO.php');
      //echo json_encode($results);
      //$message = 'Sorry p';
    } else {
      $message = 'Sorry, Those credentials do not match';
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

    <h1 style="color:white"> Login </h1>
    <span> <a style="color:white">or</a> <a href="signup.php" style="color:white"> SignUp </a> </span>

    <form action="login.php" method="post">
      <input type="text" name="email" placeholder="Enter your mail">
      <input type="password" name="password" placeholder="Enter your password">
      <input type="submit" value="Send">
    </form>
  </body>
</html>
