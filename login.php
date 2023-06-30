
<?php

    include_once("./usuarios.php");
    if(isset($_POST['enviar'])){
        
        $usuario = $_POST['usuario'];

        if($usuario == "Ok"){
            session_start();
            $_SESSION['user'] = $usuario;
            header("Location: ./aplicacion.php");
            die();
        }
        else{
            echo "Este usuario no puede ingresar";
        }
    }

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <form action="" method="POST">
        <select name="usuario">
            <?php foreach($credenciales as $credencial){ ?>

                <?php foreach($credencial as $key => $c){ ?>

                    <?php if($key != 'clave'){ ?>

                        <option><?php echo $c ?></option>

                    <?php } ?>

                <?php } ?>

            <?php } ?>
        </select>
        <input type="submit" name="enviar">
    </form>
</body>
</html>