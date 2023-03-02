<?php include_once('conexionBBDD.php'); ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv= "content-type" content="text/html;charset=es">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="title" content="Pagina de la lista de ususarios">
    <meta name="keywords" content="usuarios, users, lista, id, username, email">
    <meta name="description" content="en esta pagina saldra la lista de usuarios, donde podras ver su nombre, su id y su email">
    <link rel="stylesheet" href="../css/listaUsers.css">
    <link rel="stylesheet" href="../css/general.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Pagina de la lista de usuarios</title>
</head>

<body>
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
            <button id="btnLogin">Login</button>
        </a>
    </header>

    <div id="body">
        <table>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Correo electrónico</th>
                <?php $sql = "SELECT * FROM usuarios";
                $result = mysqli_query($conexion, $sql);
                while ($row = mysqli_fetch_assoc($result)): ?>
                <tr>
                    <td>
                        <?php echo $row['idUsuario']; ?>
                    </td>
                    <td>
                        <?php echo $row['nombre']; ?>
                    </td>
                    <td>
                        <?php echo $row['email']; ?>
                    </td>
                </tr>
            <?php endwhile; ?>
        </table>
    </div>

    <footer class="footer">

        <div class="footer-left">
            <h3>L&S<span>WebProject</span></h3>
            <a href="../home.php" title="link al home">Home</a>
            <a href="../estadisticas.php" title="link a estadisticas">Estadísticas</a>
            <a href="../farmacos.php" title="link a farmacos">Fármacos</a>
            <a href="../proteinas.php" title="link a proteinas">Proteínas</a>
            <a href="listaUsers.php" title="link a users">Users</a>
            </p>
        </div>

        <div class="footer-center">
            <div>
                <i class="fa fa-map-marker"></i>
                <p><span>Calle localizada</span>Barcelona</p>
            </div>
            <div>
                <i class="fa fa-phone"></i>
                <p>+34 648 28 40 26</p>
            </div>
            <div>
                <i class="fa fa-envelope"></i>
                <p><a href="mailto:support@company.com" title="link al email">L&Swp@gmail.com</a></p>
            </div>
        </div>

        <div class="footer-right">
            <p class="infop">
                <span>Sobre la página</span>
                Mejor página web para guardar y crear fármacos y proteínas :D
            </p>
            <div class="footer-icons">
            <a href="https://es-es.facebook.com/" title="link a la pagina de facebook"><i class="fa fa-facebook"></i></a>
                <a href="https://twitter.com/" title="link a la pagina de twitter"><i class="fa fa-twitter"></i></a>
                <a href="https://github.com/" title="link a la pagina de github"><i class="fa fa-github"></i></a>
                <a href="web.whatsapp.com" title="link al chat directo de whatsapp"><i class="fa fa-whatsapp"></i></a>
            </div>
        </div>

    </footer>
</body>

</html>