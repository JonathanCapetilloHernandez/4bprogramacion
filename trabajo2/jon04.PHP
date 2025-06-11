<?php
ob_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap-theme.min.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
 
 
 
 
        <title>Mostrar Datos Relacionados</title>
</head>
<body>
    
<nav class="navbar navbar-light">
        <div class="container">
            <a class="navbar-brand" href="index.html">INICIO</a>

            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="nav navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="unidad1.html" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">UNIDAD 1</a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="jon01.PHP">Practica 1</a><br>
                            <a class="dropdown-item" href="jon02.PHP">Practica 2</a><br>
                            <a class="dropdown-item" href="jon03.PHP">Practica 3</a>
                        </div>
                    </li>
                </ul>
                <ul class="nav navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="unidad2.html" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">UNIDAD 2</a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="jon04.PHP">Practica 4</a><br>
                            <a class="dropdown-item" href="jon05.PHP">Practica 5</a><br>
                            <a class="dropdown-item" href="jon06.PHP">Practica 6</a>
                        </div>
                    </li>
                </ul>
                <ul class="nav navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="unidad3.html" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">UNIDAD 3</a>
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
    
    <nav class="navbar navbar-light" style="background-color: black;">
      <div class="container">
        <a class="navbar-brand" href="index.html" style="color: white;">INICIO</a>
        
        
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
        </div>
      </div>
     </nav>
     
     <style>
        .container{
            width:50%;
        }
        h1, h2{
            text-align: center;
            color: #ff79c6;
            margin-bottom: 15px;
        }
        form{
            
          display: flex;
          flex-direction: column;
        }
        label{

            font-size: 16px;
            margin-bottom:5px;
        }
        input[type = "text"]{
          padding:8px;
          margin-bottom:10px;
          border:none;
          border-radius:10px;
          font-size:16px;
          background-color:#44475a;
          color:fff;

        }
        input[type ="submit"]{
            padding:10px;
            margin-bottom:10px;
            border:none;
            border-radius:10px;
            font-size:16px;
            background-color:#fa7b;
            color:pointer;
            transition: background 0.3s;
        }
        input[type="submit"]:hover{
            background-color:#3ae374;
        }
        </style>
        <table class="table table-bordered"> 
            <thead>
                <tr>
                    <th>Numero de control</th>
                    <th>Nombre</th>
                    <th>Apellido paterno</th>
                    <th>Apellido materno</th>
                    <th>Edad</th>
                    <th>Colonia</th>
                    <th>Especialidad</th>
                    <th>Genero</th>
                    <th>Correo</th>
                    <th>Telefono</th>
                    <th>fecha de ingreso</th>
                </tr>
            
            </thead>
            <tbody>
      <?php
      error_reporting(E_ALL);
      ini_set('display_errors', 1);
    $username = "root";
    $password = "";
    $servername = "localhost";
    $database = "cetis132";
        $conexion = new mysqli($servername, $username, $password, $database);
         if($conexion->connect_error){
                die("La conexion fallo " . $conexion->connect_error);
            }
            $sql = "SELECT 
            a.numero_control,
            a.nombre,
            a.apellido_paterno,
            a.apellido_materno,
            e.edad,
            c.nombre_colonia,
            es.nombre_especialidad,
            g.nombre_genero,
            a.correo,
            a.telefono,
            a.fecha_ingreso
        FROM alumnos a
        JOIN edades e ON a.id_edad = e.id
        JOIN colonias c ON a.id_colonia = c.id
        JOIN especialidades es ON a.id_especialidad = es.id
        JOIN generos g ON a.id_genero = g.id";

$resultado = $conexion->query($sql);

if (!$resultado) {
    die("Error en la consulta: " . $conexion->error);
}

if ($resultado->num_rows > 0) {
    while ($row = $resultado->fetch_assoc()) {
        echo "<tr>
                  <td>{$row['numero_control']}</td>
                  <td>{$row['nombre']}</td>
                  <td>{$row['apellido_paterno']}</td>
                  <td>{$row['apellido_materno']}</td>
                  <td>{$row['edad']}</td>
                  <td>{$row['nombre_colonia']}</td>
                  <td>{$row['nombre_especialidad']}</td>
                  <td>{$row['nombre_genero']}</td>
                  <td>{$row['correo']}</td>
                  <td>{$row['telefono']}</td>
                  <td>{$row['fecha_ingreso']}</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "<p>No se encontraron registros en la base de datos.</p>";
}
        $conexion->close();
?>
</div>
<div class="row" style="left:20px">
            <div class="col-sm-2">
            <div class="card text-white bg-primary mb-3" style="max-width: 18ren;">
                <div class="card-header">Practica 1</div>
                <div class="card-body">
                    <h5 class="card-title">mySQL</h5>
                    <p class="card-text">Primera practica para demostrar lo aprendido en mySQL.</p>
                </div>
                </div>
               </div></body>
</html>