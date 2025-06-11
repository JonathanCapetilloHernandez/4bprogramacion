<?php
ob_start();
?>
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
<nav class="navbar navbar-light">
    <div class="container">
        <a class="navbar-brand" href="index.html">INICIO</a>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="nav navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="unidad1.html" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">UNIDAD 1</a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="jon01.php">Práctica 1</a>
                        <a class="dropdown-item" href="jon02.php">Práctica 2</a>
                        <a class="dropdown-item" href="jon03.php">Práctica 3</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="unidad2.html" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">UNIDAD 2</a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="jon04.php">Práctica 4</a>
                        <a class="dropdown-item" href="jon05.php">Práctica 5</a>
                        <a class="dropdown-item" href="jon06.php">Práctica 6</a>
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
    .form-container {
      background-color: #fff0f5;
      padding: 20px;
      border-radius: 10px;
      margin-top: 20px;
    }
    input, textarea {
      width: 100%;
      padding: 8px;
      margin: 5px 0;
      border-radius: 5px;
      border: none;
    }
    input[type="submit"] {
      background-color: #ffb3d9;
      color: #4a2b63;
      cursor: pointer;
    }
    input[type="submit"]:hover {
      background-color: #ff99cc;
    }
    .success {
      color: #4a2b63;
      background-color: #ccffcc;
      padding: 10px;
      border-radius: 5px;
    }
    .error {
      color: #4a2b63;
      background-color: #ffcccc;
      padding: 10px;
      border-radius: 5px;
    }
</style>

<div class="jumbotron">
    <div class="container">
        <h1>Agregar Ositos Cariñositos</h1>
        <div class="form-container">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" id="formulario">
                <label for="Personaje">Personaje:</label>
                <input type="text" id="Personaje" name="Personaje" required><br>
                <label for="Caracteristicas">Características:</label>
                <input type="text" id="Caracteristicas" name="Caracteristicas" required><br>
                <label for="Símbolo">Símbolo:</label>
                <input type="text" id="Símbolo" name="Símbolo" required><br>
                <label for="Color">Color:</label>
                <input type="text" id="Color" name="Color" required><br>
                <label for="Habilidades">Habilidades:</label>
                <input type="text" id="Habilidades" name="Habilidades" required><br>
                <input type="submit" value="Agregar al registro"><br>
            </form>
        </div>
        <?php
        $username = "root";
        $password = "";
        $servername = "localhost";
        $database = "care_bears";
        $conexion = new mysqli($servername, $username, $password, $database);
        if ($conexion->connect_error) {
            die("La conexión falló: " . $conexion->connect_error);
        }
        function insertarOsito($conexion) {
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $Personaje = $conexion->real_escape_string($_POST["Personaje"]);
                $Caracteristicas = $conexion->real_escape_string($_POST["Caracteristicas"]);
                $Símbolo = $conexion->real_escape_string($_POST["Símbolo"]);
                $Color = $conexion->real_escape_string($_POST["Color"]);
                $Habilidades = $conexion->real_escape_string($_POST["Habilidades"]);
                $sql = "INSERT INTO carebears (Personaje, Caracteristicas, Símbolo, Color, Habilidades) VALUES ('$Personaje', '$Caracteristicas', '$Símbolo', '$Color', '$Habilidades')";
                if ($conexion->query($sql) == TRUE) {
                    echo "<p class='success'>Nuevo osito agregado con éxito</p>";
                } else {
                    echo "<p class='error'>Error al agregar el osito: " . $conexion->error . "</p>";
                }
            }
        }
        insertarOsito($conexion);

        $sql = "SELECT * FROM carebears";
        $resultado = $conexion->query($sql); 

        if ($resultado->num_rows > 0) {
            echo "<table class='table table-bordered'>";
            echo "<tr><th>ID</th><th>Personaje</th><th>Características</th><th>Símbolo</th><th>Color</th><th>Habilidades</th></tr>";
            while ($row = $resultado->fetch_assoc()) {
                echo "<tr><td>" . $row["ID"] . "</td><td>" . $row["Personaje"] . "</td><td>" . $row["Caracteristicas"] . "</td><td>" . $row["Símbolo"] . "</td><td>" . $row["Color"] . "</td><td>" . $row["Habilidades"] . "</td></tr>";
            }
            echo "</table>";
        } else {
            echo "<p>No se encontraron ositos cariñositos en la base de datos.</p>";
        }
        $conexion->close();
        ?>
    </div>
</div>
</body>
</html>
<?php
ob_end_flush();
?>