<?php
    session_start();
    
    include_once("./include/bd.php");

    $conect = new Bd();

    $query = $conect->conexion()->prepare("SELECT * FROM pelis");
    $query->execute();
    $query->setFetchMode(PDO::FETCH_ASSOC);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplicacion</title>
</head>
<body>
    
    <?php if(isset($_SESSION['user'])){ ?>
        <h1>Usuario conectado <?php echo $_SESSION['user'] ?></h1>
        <a href="./include/logout.php">cerrar la sesión</a>
        <a href="./ordenar.php">Ordenar peliculas</a>
        <p>---------------------------------------------------</p><br><br>

        <?php while($peli = $query->fetch()){ ?>
            <a href="./detalle.php?id=<?php echo $peli['id']?>"><img src="img/<?php echo $peli['caratula'] ?>" width="100px" height="100px"></a>
            <p>Id: <?php echo $peli['id']?></p>
            <p>Titulo de la pelicula:  <?php echo $peli['nombre']?></p>
            <p>Fecha de lanzamiento:  <?php echo $peli['anio']?></p>
            <p><a href="./crud/modificar.php?id=<?php echo $peli['id']?>">Modificar</a> <a href="./crud/eliminar.php?id=<?php echo $peli['id']?>">Eliminar</a></p>
            <p>-------------------------------------------</p><br />
        <?php } ?>

    <?php } 
        else { 
    ?>
        <a href="./ordenar.php">Ordenar peliculas</a><br> <br>
        <?php while($peli = $query->fetch()){ ?>
            <a href="./detalle.php?id=<?php echo $peli['id']?>"><img src="img/<?php echo $peli['caratula'] ?>" width="100px" height="100px"></a>
            <p>Id: <?php echo $peli['id']?></p>
            <p>Titulo de la pelicula:  <?php echo $peli['nombre']?></p>
            <p>Fecha de lanzamiento:  <?php echo $peli['anio']?></p>
            <p>-------------------------------------------</p><br />
        <?php } ?>  

    <?php } ?>
</body>
</html>