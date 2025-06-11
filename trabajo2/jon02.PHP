<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
              background-color: #2e1a47;
              color: #e0b3ff;
              font-family: 'Alita Brush', sans-serif;
            }
            h1 {
              text-align: center;
              font-family: 'Alita Brush', cursive;
              color: #d19fe8;
              text-shadow: 0px 0px 10px #a774c3;
            }
            table{
              width: 100px;
              border-collapse: collapse;
              margin-top: 50px;
              border-radius: 5px solid #616;
            }
            th, td{
              width: 100%;
              text-aling: left;
              border-bottom: 2px solid #210836;
            }
            tr:nth-child(even){
              background-color:#ff9988;
              color:black;
            }
            tr:nth-child(odd){
              background-color:white;
              color:black;
            }
            nav {
              background-color: #3e1b56 !important;
            }
            th{
              background-color:#ee99ee;
              color:white;
            }
            .jumbotron {
              background: linear-gradient(135deg, #4a2b63 30%, #7c4997 100%);
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

    <div class="jumbotron">
        <h1 class="display-4">Tabla de Ositos Cariñositos</h1>
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

        if ($resultado->num_rows > 0) {
            echo "<table>";
            echo "<tr><th>ID</th><th>Personaje</th><th>Características</th><th>Símbolo</th><th>Color</th><th>Habilidades</th></tr>";
            while ($row = $resultado->fetch_assoc()) {
                echo "<tr><td>" . $row["ID"] . "</td><td>" . $row["Personaje"] . "</td><td>" . $row["Caracteristicas"] . "</td><td>" . $row["Símbolo"] . "</td><td>" . $row["Color"] . "</td><td>" . $row["Habilidades"] . "</td></tr>";
            }
            echo "</table>";
        } else {
            echo "No se encontraron ositos cariñositos en la base de datos";
        }
        $conexion->close();
        ?>
    </div>
</body>
</html>