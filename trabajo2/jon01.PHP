<!DOCTYPE html>
<html lang="es"> 
<head>
  <meta charset='utf-8'>
  <meta http-equiv='X-UA-Compatible' content='IE=edge'>
  <meta name='viewport' content='width=device-width, initial-scale=1'>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap-theme.min.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
  <link href="https://fonts.cdnfonts.com/css/alita-brush" rel="stylesheet">
  <title>Ositos Cariñositos</title>
</head>
<body>
<style>
    body {
      background-color: #ffe6f0;
      color: #4a2b63;
      font-family: 'Alita Brush', sans-serif;
    }
    h1 {
      text-align: center;
      font-family: 'Alita Brush', cursive;
      color: #ff66b2;
      text-shadow: 0px 0px 10px #ff99cc;
    }
    table {
      width: 100%;
      border-radius: 10px;
      background-color: #fff0f5;
      color: #4a2b63;
    }
    td, th {
      padding: 10px;
      text-align: left;
      border-bottom: 2px solid #ff99cc;
    }
    th {
      background-color: #ffb3d9;
    }
    tr:nth-child(even) {
      background-color: #ffe6f0;
    }
    tr:nth-child(odd) {
      background-color: #fff5f9;
    }
    nav {
      background-color: #ff66b2 !important;
    }
    .navbar-brand, .nav-link {
      color: #fff0f5 !important;
    }
    .navbar-brand:hover, .nav-link:hover {
      color: #ffffff !important;
    }
    .jumbotron {
      background: linear-gradient(135deg, #ff99cc 30%, #ffb3d9 100%);
      padding: 40px;
      border-radius: 15px;
    }
</style>

<nav class="navbar navbar-light">
    <div class="container">
      <a class="navbar-brand" href="index.html">INICIO</a>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="nav navbar-nav">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="unidad1.html" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">UNIDAD 1</a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="jon01.php">Práctica 1</a>
              <a class="dropdown-item" href="jon02.php" style="font-family: 'Alita Brush'">Práctica 2</a>
              <a class="dropdown-item" href="jon03.php" style="font-family: 'Alita Brush'">Práctica 3</a>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="unidad2.html" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">UNIDAD 2</a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="jon04.php" style="font-family: 'Alita Brush'">Práctica 4</a>
              <a class="dropdown-item" href="jon05.php" style="font-family: 'Alita Brush'">Práctica 5</a>
              <a class="dropdown-item" href="jon06.php" style="font-family: 'Alita Brush'">Práctica 6</a>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="unidad3.html" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">UNIDAD 3</a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
               <a class="dropdown-item" href="personajes.PHP">Practica 7</a><br>
                  <a class="dropdown-item" href="html/jon01.html">Practica 8</a><br>
                  <a class="dropdown-item" href="html/jon.html">Practica 9</a><br>
                  <a class="dropdown-item" href="html/pokemon.html">Practica 10</a>
                  <a class="dropdown-item" href="html/jon02.html">Practica 11</a>
              </div>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="jumbotron">
    <h1 class Asc="display-4">Bienvenidos al Mundo de los Ositos Cariñositos</h1>

    <?php
    $username = "root";
    $password = "";
    $servername = "localhost";
    $database = "care_bears";
    $conexion = new mysqli($servername, $username, $password, $database);
    if ($conexion->connect_error) {
        die("La conexión falló: " . $conexion->connect_error);
    }
    $sql = "SELECT * FROM carebears";
    $resultado = $conexion->query($sql);
    ?>

    <div class="container">
      <h1>Ositos Cariñositos</h1>
      <?php if ($resultado->num_rows > 0): ?>
        <table class="table">
          <thead>
            <tr>
              <th>ID</th>
              <th>Personaje</th>
              <th>Características</th>
              <th>Símbolo</th>
              <th>Color</th>
              <th>Habilidades</th>
            </tr>
          </thead>
          <tbody>
            <?php while ($fila = $resultado->fetch_assoc()): ?>
              <tr>
                <td><?php echo $fila['ID']; ?></td>
                <td><?php echo $fila['Personaje']; ?></td>
                <td><?php echo $fila['Caracteristicas']; ?></td>
                <td><?php echo $fila['Símbolo']; ?></td>
                <td><?php echo $fila['Color']; ?></td>
                <td><?php echo $fila['Habilidades']; ?></td>
              </tr>
            <?php endwhile; ?>
          </tbody>
        </table>
      <?php else: ?>
        <p>No se encontraron ositos cariñositos.</p>
      <?php endif; ?>
    </div>
  </div>
</body>
</html>