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
<html lang="es">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" >
	
	<title>NN</title>
	<link rel="stylesheet" href="css/miarchivo.css"></link>
	
	<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
	<script>
	
	</script>
</head>
<body>

<img id="Perfil" src="profile/p25.png" ></img>



<div class="header">
	<h2>Nombre de la página</h2>
	<pre style="font-size:12.5pt">	Welcome. <?= $user['email'] ?> </pre>
	
	<a href="logout.php"  style="color:white"> Logout </a>
</div>

<div class="navbar">
  <a href="Inicio.html" target="iframe_a">Inicio</a>
  <a href="Información.html" target="iframe_a">Información</a>
  <a href="Amigos.html" target="iframe_a">Amigos</a>
  <a href="Guardado.html" target="iframe_a">Guardado</a>
  <a href="PhotoGrid.html" target="iframe_a">Publicaciones</a>
</div>
	
<iframe name="iframe_a" id="a" src="Inicio.html"></iframe>
<iframe id="b"></iframe>

<div class="footer" style="color: white">Hecho por : <em> Alexandra Jalixto Pacora</em></div>
<div class="footer" style="color: white">Hecho por : <em> Saul Rojas Coila</em></div>
<div class="footer" style="color: white">Hecho por : <em> Raymond Negron Valqui</em></div>
<div class="footer" style="color: white">Hecho por : <em> Daryl Butron Cuayla</em></div>

</body>

</html>