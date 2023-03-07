<?php include_once('conexionBBDD.php');
error_reporting(E_ALL ^ E_NOTICE);
$nom=ucfirst($_POST["nombre"]);   
$idProteina=$_POST["idProteina"];
$prueba="A";
$errorCrear ="";
if (isset($_POST['enviar'])) $sele=$_POST['enviar'];
else $sele="0";
session_start();
if(isset($_SESSION['usuario']) && isset($_SESSION['contrasenya']))
{
$idUsuario=$_SESSION["idUsuario"];
$rol=$_SESSION["rol"];
$usuario=$_SESSION["usuario"];
$btnLog = "<div id='divUsuario'><p>".$usuario."</p></div><a href='logout.php'>
<button id='btnLogin'>Logout</button>
</a>";
}
else 
{
    $btnLog = '<a href="login.php">
    <button id="btnLogin" title="Login">Login</button>
    </a>';
}
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
    <title>Gestión de usuarios</title>
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
        <?php
        echo $btnLog;
        ?>
    </header>

    <div id="body">
        <div class="menuBotones">
            <a class="barraBotonesLink">
                <button class="btnNormal" onclick="crearUsuario()">Crear usuario</button>
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
        <h2 id="titulo" style="display:block;width:100%;">Listado de usuarios</h2>
            <?php if ($sele=="0"){	 ?>
                <div id="divInputs" style="display:none">
                    <?php $sql = "SELECT * FROM usuarios";
                          $result = mysqli_query($conexion, $sql);?>
                        
                        <table id= "modificar">
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Correo electrónico</th>
                                <th>Rol</th>
                                <th>Activo</th>
                                <th class="modificarUsuarios" style="height:auto; color:#7FB3D5"><?php echo $prueba;?></th>
                            </tr>
                            <?php while ($row = mysqli_fetch_assoc($result)){ ?>
                                <tr>
                                    <form action="listaUsers.php" method="post" name="formu">
                                        <td class="search-form-id">        
                                        <input type="text" class="search-form" value="<?php echo $row['idUsuario']; ?>" name="fakeidUser" disabled/>           
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
                                        <input type="hidden" value="1" name="enviar" id ="enviar">
                                        <input type="hidden" value="<?php echo $row['idUsuario']; ?>" name="idUser" id ="enviar">
                                    </form>
                                </tr>
                            <?php }?>  
                        </table>
                        <form action="listaUsers.php" method="post" name="formu"> 
                            <table id="eliminar">
                            <tr>
                                <th  style="height:auto; color:#7FB3D5"><?php echo $prueba;?></th>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Correo electrónico</th>
                                <th>Rol</th>
                                <th>Activo</th>             
                            </tr>
                            <?php 
                            $sql = "SELECT * FROM usuarios";
                            $result = mysqli_query($conexion, $sql);
                            while ($row = mysqli_fetch_assoc($result)){ ?>
                                <tr>
                                
                                    <td class="eliminarUsuarios"><input type="checkbox" value="<?php echo $row['idUsuario']; ?>" name="check[]"/>
                                    <td class="search-form-id">
                                        <input type="text" class="search-form-id" value="<?php echo $row['idUsuario']; ?>" name="idUsuario" disabled/>                       
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
                            <?php }?>
                                <input type="hidden" value="2" name="enviar" id ="enviar">
                        </table>
                        <input id="btnEliminarUsuarios" type="submit" value="Eliminar" name="eliminar" class="btnNormal"/>
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
            <div id="divCrearUsuario" style="display:none">
            <form action="listaUsers.php" method="post" name="formu">
            <table id= "crear">
                            <tr>
                                <th>Nombre Usuario</th>
                                <th>Correo electrónico</th>
                                <th>Contraseña</th>
                                <!--<th>Repite la contrasenya</th>-->
                                <th>Rol</th>
                            </tr>
                                <tr>
                                        <td >        
                                        <input type="text" class="search-form" placeholder="Nombre" name="nom" required/>           
                                        </td>
                                        <td>
                                            <input type="text" class="search-form" placeholder="Email" name="email"required/>
                                        </td>
                                        <td>
                                            <input type="text" class="search-form" placeholder="Contraseña" name="contrasenya" required/> 
                                        </td>
                                       <!--<td>
                                            <input type="text" class="search-form"  placeholder="Repite la contrasenya" name="contrasenya2" required/> 
                                        </td>-->
                                        <td>
                                            <input type="text" class="search-form" placeholder="Rol" name="rol"required/>
                                        </td>
                                        
                                </tr>
                        </table>
                        <input type="hidden" value="3" name="enviar" id ="enviar">
                        <input class="btnNormal" type="submit" value="Crear" name="crear"/>
                        <input class="btnNormal" type="reset" value="reset" name="reset"/>
                        <?php echo $errorCrear;?>
            </form>
            </div>
        </div>

        <?php } 
        elseif ($sele=="1"){
            $idUsuario=$_POST["idUser"];
            $nom=$_POST["nom"];
            $email=$_POST["email"];
            $rol=$_POST["rol"];
            if($_POST["activo"]=="Activo"){$activo= 1;}elseif($_POST["activo"]=="Inactivo"){$activo= 0;} ;//else{$activo= null};
            $sql="UPDATE usuarios set nombre='$nom', email='$email', rol='$rol', activo='$activo' where idUsuario ='$idUsuario'";
            $resultado = mysqli_query($conexion, $sql);
            echo '<script type="text/javascript">'; 
                echo 'alert("Se han modificado correctamente el usuario!");'; 
                echo 'window.location = "listaUsers.php";';
                echo '</script>';
            //$sele="0";
            //echo $sql;
            //header("Location: listaUsers.php");
        }
        elseif($sele=="2"){
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
             echo "Se han eliminado ".$eliminats . " usuarios";
             $sele="0";
             echo '<script type="text/javascript">'; 
                echo 'alert("Se han eliminado '.$eliminats.' usuarios!");'; 
                echo 'window.location = "listaUsers.php";';
                echo '</script>';
             //header("Location: listaUsers.php");
         mysqli_close($conexion);
        }
        elseif ($sele=="3"){
            $nom=$_POST["nom"];
            $email=$_POST["email"];
            $sql="SELECT * FROM usuarios where nombre like ('%$nom%')";
            $resultado = mysqli_query($conexion, $sql);
            $sql2="SELECT * FROM usuarios where email like ('%$email%')";
            $resultado2 = mysqli_query($conexion, $sql2);
            //$sele="0";
            if(mysqli_fetch_assoc($resultado)>0){
                
                echo '<script type="text/javascript">'; 

                echo 'alert("Ya existe un usuario con este nombre de usuario! Prueba con otro nombre '.$sql.'");'; 
                echo 'window.location = "listaUsers.php";';
                echo 'crearUsuario();</script>';
                //$errorCrear = "<p>Ya existe un usuario con ese nombre! Prueba con otro nombre de usuario.</p>";
                //$sele="0";
                //header("Location: listaUsers.php");
            }elseif(mysqli_fetch_assoc($resultado2)>0){
                echo '<script type="text/javascript">'; 
                echo 'alert("Ya existe un usuario con este email! Introduce otro email diferente.");'; 
                echo 'window.location = "listaUsers.php";';
                echo 'crearUsuario();</script>';
            }else{
                $nom=$_POST["nom"];
                $email=$_POST["email"];
                $contrasenya=$_POST["contrasenya"];
                $rol=$_POST["rol"];
                $fecha=date("Y-m-d.H:i:s");
                $sql="INSERT INTO `usuarios`(`nombre`, `contrasenya`, `email`, `rol`, `fechaAlta`, `activo`) VALUES ('$nom','$contrasenya','$email','$rol','$fecha','1')";
                $resultado = mysqli_query($conexion, $sql);
                //$sele="0";
                $errorCrear ="";
                echo $sql;
                header("Location: listaUsers.php");
            }
            
        }
       
?>
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