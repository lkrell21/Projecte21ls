<?php include_once('conexionBBDD.php');
error_reporting(E_ALL ^ E_NOTICE);
$nom=ucfirst($_POST["nombre"]);   
$idProteina=$_POST["idProteina"];
$prueba="A";
if (isset($_POST['enviar'])) $sele=$_POST['enviar'];
else $sele="0";
session_start();
$idUsuario=$_SESSION["idUsuario"];
$rol=$_SESSION["rol"];
?>
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
    <link rel="stylesheet" href="css/listaUsers.css">
    <link rel="stylesheet" href="css/general.css">
    <script type="text/javascript" src="funcions.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Consulta usuarios</title>
</head>

<body>
    <header style="background-image: url('img/header3.jpg'); height: 200px;">
        <h1 id="header">Lucas & Sheila webproject</h1>
        <nav style="margin-top: 55px;">
            <a href="home.php" title="link al home">Home</a>
            <a href="estadisticas.php" title="link a estadisticas">Estadísticas</a>
            <a href="farmacos.php" title="link a farmacos">Fármacos</a>
            <a href="proteinas.php" title="link a proteinas">Proteínas</a>
            <?php if($rol=="administrador"){
            echo '<a href="listaUsers.php" title="link a users">Usuarios</a>';
            }?>

        </nav>
        <a href="../login.php">
            <button id="btnLogin">Login</button>
        </a>
    </header>

    <div id="body">
        <div class="menuBotones">
            <a href="crear_usuario.php" class="barraBotonesLink" >
                <button class="btnNormal">Crear usuario</button>
            </a>
            <a class="barraBotonesLink">
                <button class="btnNormal" onclick="modificarUsuarios()">Modificar usuarios</button>
            </a>
            <a class="barraBotonesLink">
                <button class="btnNormal" onclick="eliminarUsuarios()">Eliminar usuarios</button>
            </a>
            <a class="barraBotonesLink">
                <button class="btnNormal" onclick="consultarUsuarios()">Consultar usuarios</button>
            </a>
        </div>
        <div id="divEliminar" >
                <div id="eliminarBody">
                    <div class="eliminar-div">
                        <h2 >Seguro que quiere eliminar?</h2>
                            <form id="form" action="proteina.php" method="post" style="margin-top:0;margin-right:0" >                                                       
                                <input type="submit" value="Eliminar" class="buttonEspecial" id="eliminar2"></input>
                                <input type="hidden" value="<?php echo $idProteina;?>" name="idProteina"></input>
                                <input type="hidden" value="1" name="eliminar"></input>
                            </form>                           
                            <button class="buttonEspecial" id="cancelar" onclick="cancelarEliminar()">Cancelar</button>
                                                
                    </div>
                </div>
        </div>
        <div class="first-body">
            <?php
                if ($sele=="0"){	
            ?>
                    <div id="divInputs" style="display:none">
                    <form action="listaUsers.php" method="post" name="formu"> 
                        <table>
                            <tr>
                                <th  class="eliminarUsuarios" style="height:auto; color:#7FB3D5"><?php echo $prueba;?></th>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Correo electrónico</th>
                                <th>Rol</th>
                                <th>Activo</th>
                                <th class="modificarUsuarios" style="height:auto; color:#7FB3D5"><?php echo $prueba;?></th>
                            </tr>
                                <?php 
                                $sql = "SELECT * FROM usuarios";
                                $result = mysqli_query($conexion, $sql);
                                while ($row = mysqli_fetch_assoc($result)){ 
                                ?>
                                <tr>
                                    <td class="eliminarUsuarios"><input type="checkbox" value="<?php echo $row['idUsuario']; ?>" name="check[]"/>
                                    <td>
                                        <input type="text" class="search-form" value="<?php echo $row['idUsuario']; ?>" name="idUsuario" disabled/>                       
                                    </td>
                                    <td>
                                        <input type="text" class="search-form" value="<?php echo $row['nombre']; ?>" name="nom"/> 
                                    </td>
                                    <td>
                                        <input type="text" class="search-form" value="<?php echo $row['email']; ?>" name="email"/>
                                    </td>
                                    <td>
                                        <input type="text" class="search-form" value="<?php echo $row['rol']; ?>" name="rol"/>
                                    </td>
                                    <td>
                                        <input type="text" class="search-form" value="<?php if( $row['activo']==0){echo "Inactivo";} else {echo "Activo";} ?>" name="activo"/>
                                    </td>
                                    <td class="modificarUsuarios">
                                        <input class="modificarUsuarios" type="submit" value="Modificar" name="modificar"/>
                                    </td>
                                </tr>
                                <input type="hidden" value="0" name="enviar" id ="enviar">
            <?php } ?>
                        </table>
                        <input id="btnEliminarUsuarios" type="submit" value="Eliminar" name="modificar" class="btnNormal"/>
                    </form>
                    </div>
        <div id="divConsultas" style="display:block">
            <table>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Correo electrónico</th>
                    <th>Rol</th>
                    <th>Activo</th>
                    <?php $sql = "SELECT * FROM usuarios";
                    $result = mysqli_query($conexion, $sql);
                    while ($row = mysqli_fetch_assoc($result)){ 
                    ?>
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
                        <td>
                            <?php echo $row['rol']; ?>
                        </td>
                        <td>
                            <?php if( $row['activo']==0){echo "Inactivo";} else {echo "Activo";} ?>
                        </td>
                    </tr>
                <?php } ?>
            </table>
        </form>
        </div>
        </div>
        <?php } elseif($sele=="2"){
             $agafats = $_POST['check'];
             $eliminats = 0;
             for ($i = 0; $i < count($agafats); $i++){
                 $id = $agafats[$i];
                 $sql="DELETE from farmacos where iUsuario=".$id;     
                 $resultado = mysqli_query($conexion, $sql);
                 $sql="DELETE from proteinas where idUsuario=".$id; 
                 $resultado = mysqli_query($conexion, $sql);   
                 $sql="DELETE from usuarios where idUsuario=".$id; 
                 $resultado = mysqli_query($conexion, $sql);   
                 $eliminats++;
                 //echo "<br>".$sql."<br>";
             }
             echo "S'han eliminat ".$eliminats . " alumnes";
         mysqli_close($conexion);
        }
        elseif ($sele=="2"){
            //CODIGO PARA MODIFICAR USUARIOS
        }
?>
    </div>
    <div>

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