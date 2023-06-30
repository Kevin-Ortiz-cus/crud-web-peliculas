<?php

    session_start();

    if(!isset($_SESSION['user'])){
        header("Location: ../login.php");
        die();
    }

    include_once("../include/bd.php");

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
    <title>Modificar</title>
</head>
<body>
        <img src="../img/<?php echo $peli['caratula'] ?>" width="200px" height="200px">
        <p>Id: <?php echo $peli['id']?></p>
        <p>Titulo de la pelicula:  <?php echo $peli['nombre']?></p>
        <p>Fecha de lanzamiento:  <?php echo $peli['anio']?></p>
        <a href="#">Modificar</a>
</body>
</html>