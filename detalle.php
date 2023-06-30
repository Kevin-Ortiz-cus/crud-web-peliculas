<?php

    session_start();

    include_once("./include/bd.php");

    $id = $_GET['id'];

    $conect = new Bd();

    $query = $conect->conexion()->prepare("SELECT * FROM pelis WHERE id=$id");
    $query->execute();
    $query->setFetchMode(PDO::FETCH_ASSOC);
    $peli = $query->fetch();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina detallada</title>
</head>
<body>
    <?php if(isset($_SESSION['user'])){ ?>
        <h1>Usuario conectado <?php echo $_SESSION['user'] ?></h1>
        <a href="./include/logout.php">cerrar la sesión</a>
        <p>-------------------------------------------------</p><br>
    <?php } ?>

        <img src="./img/<?php echo $peli['caratula'] ?>" width="200px" height="200px">
        <p>Id: <?php echo $peli['id']?></p>
        <p>Titulo de la pelicula:  <?php echo $peli['nombre']?></p>
        <p>Fecha de lanzamiento:  <?php echo $peli['anio']?></p>
        <a href="./index.php">Regresar pagina inicial</a><br><br>
        <a href="./aplicacion.php">Ir pagina de consultas</a>
</body>
</html>