<?php include_once('conexionBBDD.php'); ?>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="title" content="pagina de consulta de proteinas">
    <meta name="keywords" content="proteina, consulta, busqueda, edicion, eliminar">
    <meta name="description" content="en esta pagina podremos ver la consulta de proteinas">
    <link rel="stylesheet" href="../css/farmacos.css">
    <link rel="stylesheet" href="../css/general.css">
    <link rel="stylesheet" href="../css/proteinas.css"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>pagina de consulta de proteinas</title>
</head>

<body> <!--<h1>Consultar</h1>-->
    <header style="background-image: url('../img/header3.jpg'); height: 200px;">
        <h1 id="header">Lucas & Sheila webproject</h1>
        <nav style="margin-top: 55px;">
        <a href="../home.php" title="link al home">Home</a>
            <a href="../estadisticas.php" title="link a estadisticas">Estadísticas</a>
            <a href="../farmacos.php" title="link a farmacos">Fármacos</a>
            <a href="../proteinas.php" title="link a proteinas">Proteínas</a>
            <a href="listaUsers.php" title="link a users">Users</a>
        </nav>
        <a href="../login.php">
            <button type="submit">Login</button>
        </a>
    </header>

    <div id="body">
        <div class="search-body">
            <div id="form-div">
                <form id="form" action="consultaProteinas.php" method="post">
                    <input type="text" class="search-form" placeholder="Nom" name="nom" />
                    <input type="text" class="search-form" placeholder="Resolució" name="resolucio" />
                    <input type="text" class="search-form" placeholder="Especie" name="especie" />
                    <input type="text" class="search-form" placeholder="Data" name="data" />
                    <input type="text" class="search-form" placeholder="Metode" name="metode" />
                    <input type="text" class="search-form" placeholder="Codi de la proteïna" name="idProteina" />
                    <input type="submit" class="search-button" value="Cerca" onclick='busqueda()' />
                </form>
            </div>
        </div>
        <?php

        $sql = "SELECT * FROM proteinas";
        //coger usuario y contraseña del formulario del login
        if ($_POST["nom"] != null) {
            $nom = $_POST["nom"];
            $sql = $sql . " where nombre = '$nom'";
        }
        if ($_POST["resolucio"] != null) {
            $resolucio = $_POST["resolucio"];
            $sql = $sql . " AND resolucion = '$resolucio'";
        }
        if ($_POST["especie"] != null) {
            $especie = $_POST["especie"];
            $sql = $sql . " AND especie = '$especie'";
        }
        if ($_POST["data"] != null) {
            $fecha = $_POST["data"];
            $sql = $sql . " AND cast(date,fecha) = '$fecha'";
        }
        if ($_POST["metode"] != null) {
            $fecha = $_POST["metode"];
            $sql = $sql . " AND metode = '$metode'";
        }
        if ($_POST["idProteina"] != null) {
            $idProteina = $_POST["idProteina"];
            $sql = $sql . " AND idProteina = '$idProteina'";
        }
        $datos = "";
        //  'jacinto';
//$resolucio =$_POST ["resolucio"];//  '1234';
//$especie =$_POST ["especie"];
//$data =$_POST ["data"];
//$metode=$_POST ["metode"];
/*$idProteina=$_POST ["idProteina"];

$sql= "SELECT * FROM proteinas where nombre = '$nom' AND idProteina = '$idProteina'";*/
        $resultado = mysqli_query($conexion, $sql);
        //header("Location: ../proteinas.php?resultado=".$resultado);
        if (mysqli_num_rows($resultado) > 0) {
            //mostrar la pàgina de inicio con el usuario logado
            while ($row = mysqli_fetch_assoc($resultado)) {
                $datos = $datos .
                    "<div class='first-body'><img class='body-images' src='" . $row["imagen"] . "'/><div class='inner-first-body'><h1><a href='proteina.php'>" . $row["nombre"] . "</a></h1><p>
                " . $row["descripcion"] . "</p></div></div>";
                //<h1>id: " . $row["idProteina"]. " - Nom: " . $row["nombre"]. " - Resolucio" . $row["resolucion"]."</h1>";
            }
            echo $datos;
        } else
            echo "Usuario o contraseña incorrecto.";

        //header("Location: ../proteinas.php?resultado=".$datos);
        ?>
</body>

</html>