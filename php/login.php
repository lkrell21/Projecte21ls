<?php include_once('../conexionBBDD.php'); ?>
<html lang="es">

<head>
    <title>INDEX</title>
</head>

<body> <!--<h1>Consultar</h1>-->
    <?php
    if(isset($_POST['usuario']) && isset($_POST['contrasenya'])){
        $usuario = $_POST["usuario"]; //  'jacinto';
        $contrasenya = $_POST["contrasenya"]; //  '1234';
        $sql = "SELECT * FROM usuarios where nombre = '$usuario' AND contrasenya = '$contrasenya' AND activo=1";
        $resultado = mysqli_query($conexion, $sql);
        $consulta = mysqli_fetch_assoc($resultado);
        if(mysqli_num_rows($resultado) > 0 ){
            session_start();
            $_SESSION['usuario'] = $usuario;
            $_SESSION['idUsuario']=$consulta["idUsuario"];
            $_SESSION['contrasenya'] = $contrasenya;
            $_SESSION['rol']=$consulta['rol'];
            $_SESSION['editor'] = $consulta['rol'];
            $_SESSION['admin'] = $consulta['Administrador'];
            $usuario = mysqli_real_escape_string($conexion, $usuario);
            $contraseña = mysqli_real_escape_string($conexion, $contraseña);
            $contraseña = md5($contraseña);
            header('Location: ../home.php');
        }else{
                
            echo "Login incorrecte<br><a href='../login.php'>Torna a intentar-ho</a>";
           // header("Location: ");
        }

    }

    ?>
</body>

</html>


