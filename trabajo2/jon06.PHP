<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

$username = "root";
$password = "";
$servername = "localhost";
$database = "peliculasdb";

$conexion = new mysqli($servername, $username, $password, $database);
if($conexion->connect_error){
    die("La conexión falló: " . $conexion->connect_error);
}

$sql_clasificacion = "SELECT id, nombre_clasificacion FROM clasificaciones";
$result_clasificacion = $conexion->query($sql_clasificacion);

$sql_genero = "SELECT id, nombre_genero FROM generos";
$result_genero = $conexion->query($sql_genero);

$sql_director = "SELECT id, CONCAT(nombre, ' ', apellido) AS nombre_completo FROM directores";
$result_director = $conexion->query($sql_director);

$sql_estudio = "SELECT id, nombre_estudio FROM estudios";
$result_estudio = $conexion->query($sql_estudio);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $codigo = $conexion->real_escape_string($_POST["codigo"]);
    $titulo = $conexion->real_escape_string($_POST["titulo"]);
    $sinopsis = $conexion->real_escape_string($_POST["sinopsis"]);
    $anio_lanzamiento = $conexion->real_escape_string($_POST["anio_lanzamiento"]);
    $duracion = $conexion->real_escape_string($_POST["duracion"]);
    $clasificacion = $conexion->real_escape_string($_POST["clasificacion"]);
    $genero = $conexion->real_escape_string($_POST["genero"]);
    $director = $conexion->real_escape_string($_POST["director"]);
    $estudio = $conexion->real_escape_string($_POST["estudio"]);
    $fecha_registro = $conexion->real_escape_string($_POST["fecha_registro"]);

    $sql_insert = "INSERT INTO peliculas (codigo, titulo, sinopsis, anio_lanzamiento, duracion, 
                  id_clasificacion, id_genero, id_director, id_estudio, fecha_registro)
                  VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    
    $stmt = $conexion->prepare($sql_insert);
    if ($stmt) {
        $stmt->bind_param("sssiiiiiss", $codigo, $titulo, $sinopsis, $anio_lanzamiento, 
                        $duracion, $clasificacion, $genero, $director, $estudio, $fecha_registro);
        
        if($stmt->execute()){
            $_SESSION['mensaje'] = "<p class='success'>Película agregada con éxito!</p>";
            header("Location: " . $_SERVER['PHP_SELF']);
            exit();
        } else {
            $_SESSION['mensaje'] = "<p class='error'>Error: " . $stmt->error . "</p>";
        }
    } else {
        $_SESSION['mensaje'] = "<p class='error'>Error en la preparación: " . $conexion->error . "</p>";
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap-theme.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
 
    <title>CineDB - Sistema de Gestión de Películas</title>
    <style>
    body {
        background-color: #f5f5f0;
        color: #333;
        font-family: 'Cormorant Garamond', serif;
        background-image: url('https://th.bing.com/th/id/OIP.gGf6--k3kAYDqdLlDd2bSQHaE7?w=291&h=194&c=7&r=0&o=5&dpr=1.3&pid=1.7');
        background-size: cover;
        background-attachment: fixed;
        background-position: center;
        position: relative;
    }
    
    body::before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(245, 245, 240, 0.85);
        z-index: -1;
    }
    
    .container {
        width: 80%;
        margin: auto;
        padding: 20px;
    }
    
    h1, h2 {
        text-align: center;
        color: #5c4d42;
        margin-bottom: 25px;
        font-family: 'Playfair Display', serif;
        letter-spacing: 1px;
        font-weight: 700;
    }
    
    h1 {
        font-size: 36px;
        border-bottom: 2px solid #d4c1a9;
        padding-bottom: 10px;
        margin-top: 40px;
    }
    
    h2 {
        font-size: 30px;
        font-style: italic;
    }
    
    form {
        display: flex;
        flex-direction: column;
        background-color: #fff;
        padding: 30px;
        border-radius: 0;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        border: 1px solid #d4c1a9;
        position: relative;
        margin-bottom: 40px;
    }
    
    form::before {
        content: "";
        position: absolute;
        top: 10px;
        left: 10px;
        right: 10px;
        bottom: 10px;
        border: 1px solid #d4c1a9;
        pointer-events: none;
    }
    
    label {
        font-size: 18px;
        margin-bottom: 5px;
        color: #5c4d42;
        font-weight: 600;
    }
    
    input[type="text"], input[type="number"], input[type="date"], textarea, select {
        padding: 12px;
        margin-bottom: 20px;
        border: 1px solid #d4c1a9;
        border-radius: 0;
        font-size: 16px;
        background-color: #fff;
        color: #333;
        font-family: 'Cormorant Garamond', serif;
        transition: all 0.3s ease;
    }
    
    input[type="text"]:focus, input[type="number"]:focus, input[type="date"]:focus, textarea:focus, select:focus {
        outline: none;
        border-color: #5c4d42;
        box-shadow: 0 0 10px rgba(92, 77, 66, 0.2);
    }
    
    input[type="submit"] {
        padding: 12px;
        margin-top: 20px;
        border: 2px solid #5c4d42;
        border-radius: 0;
        font-size: 18px;
        background-color: #5c4d42;
        color: #fff;
        cursor: pointer;
        transition: all 0.3s ease;
        font-family: 'Playfair Display', serif;
        letter-spacing: 1px;
        font-weight: 700;
    }
    
    input[type="submit"]:hover {
        background-color: #fff;
        color: #5c4d42;
    }
    
    table {
        width: 100%;
        margin-top: 30px;
        border-collapse: collapse;
        background-color: #fff;
        border: 1px solid #d4c1a9;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
    }
    
    th, td {
        padding: 15px;
        text-align: left;
        border-bottom: 1px solid #d4c1a9;
        font-size: 16px;
    }
    
    th {
        background-color: #5c4d42;
        color: #fff;
        font-family: 'Playfair Display', serif;
        font-weight: 700;
        letter-spacing: 1px;
    }
    
    tr:nth-child(even) {
        background-color: #f9f5f0;
    }
    
    tr:nth-child(odd) {
        background-color: #fff;
    }
    
    tr:hover {
        background-color: #f0e6d9;
    }
    
    .success {
        color: #3c763d;
        text-align: center;
        font-weight: bold;
        padding: 15px;
        margin-bottom: 20px;
        background-color: #dff0d8;
        border: 1px solid #d6e9c6;
        border-radius: 0;
    }
    
    .error {
        color: #a94442;
        text-align: center;
        font-weight: bold;
        padding: 15px;
        margin-bottom: 20px;
        background-color: #f2dede;
        border: 1px solid #ebccd1;
        border-radius: 0;
    }
    
    .navbar {
        background: linear-gradient(to right, #5c4d42, #8c7b6b);
        border-radius: 0;
        border: none;
        margin-bottom: 40px;
    }
    
    .navbar-brand, .nav-link {
        color: #fff !important;
        font-family: 'Playfair Display', serif;
        font-size: 18px;
        letter-spacing: 1px;
    }
    
    .dropdown-menu {
        background-color: #f5f5f0;
        border: 1px solid #d4c1a9;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        padding: 10px;
    }
    
    .dropdown-item {
        color: #5c4d42;
        font-family: 'Cormorant Garamond', serif;
        font-size: 16px;
        padding: 8px 15px;
        display: block;
        transition: all 0.3s ease;
    }
    
    .dropdown-item:hover {
        background-color: #f0e6d9;
        color: #5c4d42;
        text-decoration: none;
    }
</style>
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
    
    <div class="container">
        <h1>Sistema de Gestión de Películas</h1>
        <?php
        if(isset($_SESSION['mensaje'])) {
            echo $_SESSION['mensaje'];
            unset($_SESSION['mensaje']);
        }
        ?>
        <form method="POST" id="formulario">
            <label for="codigo">Código de Película:</label>
            <input type="text" id="codigo" name="codigo" required>
            
            <label for="titulo">Título:</label>
            <input type="text" id="titulo" name="titulo" required>
            
            <label for="sinopsis">Sinopsis:</label>
            <textarea id="sinopsis" name="sinopsis" rows="3" required></textarea>
            
            <label for="anio_lanzamiento">Año de Lanzamiento:</label>
            <input type="number" id="anio_lanzamiento" name="anio_lanzamiento" required min="1895" max="2025">
            
            <label for="duracion">Duración (minutos):</label>
            <input type="number" id="duracion" name="duracion" required min="1" max="999">
            
            <label for="clasificacion">Clasificación:</label>
            <select name="clasificacion" required>
                <option value="">Seleccione Clasificación</option>
                <?php while ($row = $result_clasificacion->fetch_assoc()) {
                    echo "<option value='" . $row["id"] . "'>" . $row["nombre_clasificacion"] . "</option>";
                } ?>
            </select>
            
            <label for="genero">Género:</label>
            <select name="genero" required>
                <option value="">Seleccione Género</option>
                <?php while ($row = $result_genero->fetch_assoc()) {
                    echo "<option value='" . $row["id"] . "'>" . $row["nombre_genero"] . "</option>";
                } ?>
            </select>
            
            <label for="director">Director:</label>
            <select name="director" required>
                <option value="">Seleccione Director</option>
                <?php while ($row = $result_director->fetch_assoc()) {
                    echo "<option value='" . $row["id"] . "'>" . $row["nombre_completo"] . "</option>";
                } ?>
            </select>
            
            <label for="estudio">Estudio:</label>
            <select name="estudio" required>
                <option value="">Seleccione Estudio</option>
                <?php while ($row = $result_estudio->fetch_assoc()) {
                    echo "<option value='" . $row["id"] . "'>" . $row["nombre_estudio"] . "</option>";
                } ?>
            </select>
            
            <label for="fecha_registro">Fecha de Registro:</label>
            <input type="date" id="fecha_registro" name="fecha_registro" required>
            
            <input type="submit" value="Agregar Película">
        </form>
    </div>
    
    <div class="container">
        <h2>Catálogo de Películas</h2>
        <table borde="1">
            <tr>
                <th>Código</th>
                <th>Título</th>
                <th>Año</th>
                <th>Duración</th>
                <th>Clasificación</th>
                <th>Género</th>
                <th>Director</th>
                <th>Estudio</th>
                <th>Fecha Registro</th>
            </tr>
            <?php
            $sql = "SELECT
                    p.codigo,
                    p.titulo,
                    p.anio_lanzamiento,
                    p.duracion,
                    c.nombre_clasificacion,
                    g.nombre_genero,
                    CONCAT(d.nombre, ' ', d.apellido) AS director,
                    e.nombre_estudio,
                    p.fecha_registro
                FROM peliculas p
                JOIN clasificaciones c ON p.id_clasificacion = c.id
                JOIN generos g ON p.id_genero = g.id
                JOIN directores d ON p.id_director = d.id
                JOIN estudios e ON p.id_estudio = e.id
                ORDER BY p.fecha_registro DESC";
                
            $resultado = $conexion->query($sql);
            
            if($resultado->num_rows > 0) {
                while ($row = $resultado->fetch_assoc()) {
                    echo "<tr>
                        <td>{$row['codigo']}</td>
                        <td>{$row['titulo']}</td>
                        <td>{$row['anio_lanzamiento']}</td>
                        <td>{$row['duracion']} min</td>
                        <td>{$row['nombre_clasificacion']}</td>
                        <td>{$row['nombre_genero']}</td>
                        <td>{$row['director']}</td>
                        <td>{$row['nombre_estudio']}</td>
                        <td>{$row['fecha_registro']}</td>
                    </tr>";
                }
            } else {
                echo "<tr><td colspan='9'>No hay películas registradas</td></tr>";
            }
            $conexion->close();
            ?>
        </table>
    </div>
    
    <script>
    document.getElementById('formulario').addEventListener('submit', function(e) {
        let isValid = true;
        const required = this.querySelectorAll('[required]');
        
        required.forEach(function(field) {
            if (!field.value.trim()) {
                field.style.borderColor = '#E50914';
                isValid = false;
            } else {
                field.style.borderColor = '';
            }
        });
        
        if (!isValid) {
            e.preventDefault();
            alert('Por favor completa todos los campos requeridos.');
        }
    });
    </script>
</body>
</html>