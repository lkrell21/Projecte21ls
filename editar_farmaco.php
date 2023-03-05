<?php include_once('conexionBBDD.php');
error_reporting(E_ALL ^ E_NOTICE);
$nom=ucfirst($_POST["nombre2"]);   
$idFarmaco=$_POST["idFarmaco"];
if (isset($_POST['eliminar'])) $sele=$_POST['eliminar'];
else $sele="0";
if (isset($_POST['guardar'])) $sele2=$_POST['guardar'];
else $sele2="0";
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv= "content-type" content="text/html;charset=es">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="title" content="la pagina para editar farmacos">
    <meta name="keywords" content="farmaco, farmacos, editar, modificar, eliminar">
    <meta name="description" content="en esta pagina podras editar o eliminar unicamente los farmacos que estan bajo tu nombre">
    <link rel="stylesheet" href="css/individual.css">
    <link rel="stylesheet" href="css/general.css">
    <script type="text/javascript" src="funcions.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title><?php echo $nom;?></title>
</head>
<body>
    <header style="background-image: url('img/header3.jpg'); height: 200px;">
        <h1 id="header">Lucas & Sheila webproject</h1>
        <nav style ="margin-top: 55px;">
        <a href="home.php" title="link al home">Home</a>
            <a href="estadisticas.php" title="link a estadisticas">Estadisticas</a>
            <a href="farmacos.php" title="link a farmacos">Farmacos</a>
            <a href="proteinas.php" title="link a proteinas">Proteinas</a>
            <a href="php/listaUsers.php" title="link a users">Users</a>

        </nav>
        <a href="login.php">
        <button id="btnLogin" title="link al login">Login</button>
        </a>
        </header>

        <div id="body">
        <div id="divEliminar" >
                <div id="eliminarBody">
                    <div class="eliminar-div">
                        <h2 >Seguro que quiere eliminar?</h2>
                            <form id="form" action="farmac.php" method="post" style="margin-top:0;margin-right:0" >                                                       
                                <input type="submit" value="Eliminar" class="buttonEspecial" id="eliminar2"></input>
                                <input type="hidden" value="<?php echo $idFarmaco;?>" name="idFarmaco"></input>
                                <input type="hidden" value="1" name="eliminar"></input>
                            </form>                           
                            <button class="buttonEspecial" id="cancelar" onclick="cancelarEliminar()">Cancelar</button>
                                                
                    </div>
                </div>
            </div>
            <?php if($sele==1){    
                                $idProteina = $_POST["idFarmaco"];

                                $sql = "DELETE FROM farmacos WHERE idFarmaco = ".$idFarmaco;  
                                
                                $resultado = mysqli_query($conexion, $sql);
                                   
                                $sql2="SELECT * FROM farmacos WHERE idFarmaco = '".$idFarmaco."'";
                                $resultado2 = mysqli_query($conexion, $sql);
                                    //if (mysqli_fetch_assoc($resultado2) > 0) {
                                      //  echo "Error al eliminar <br>";
                                
                                    //}  
                                                            
                            ?>
                            <div id="divEliminar"class="divEliminar" style="display:block; margin-top:-200px" >
                                <div id="eliminarBody">
                                    <div id="eliminar-div">
                                        <h2 >Se ha eliminado correctamente</h2>
                                            <button id="aceptar" class="btnNormal" onclick="aceptarEliminarFarmaco()">Acceptar</button>
                                        
                                    </div>
                                </div>
                            </div>

                            <?php 
                            }
            if($sele2=="1"){
                $nom=$_POST["nom"];
                $smiles =$_POST ["smiles"];
                $inchl =$_POST ["inchl"];
                $fecha=date("Y-m-d.H:i:s");
                $estat =$_POST ["estat"];
                $descripcio =$_POST ["descripcio"];
                $imatge=$_FILES["imatge"]["name"];
                $info = pathinfo($imatge);
                $tipoFichero= $info["extension"];
                $nomImatge = "img/farmacos/".$nom.".".$tipoFichero;
                //$idUsuario= 2;
                

                if (is_uploaded_file($_FILES["imatge"]["tmp_name"])) {
                    $res = move_uploaded_file($_FILES["imatge"]["tmp_name"], $nomImatge);
                    $sql="UPDATE `farmacos` SET `nombre`='".$nom."', SMILES='".$smiles."', fecha='".$fecha."', tipoFichero='".$tipoFichero."', imagen='".$nomImatge."', estado='".$estat."', descripcion ='".$descripcio."' where idFarmaco='".$idFarmaco."'";
                
                    //echo "IMAGEN: ".$sql."<br>".$nomImatge;
                }
                else{

                    $sql="UPDATE `farmacos` SET `nombre`='".$nom."', SMILES='".$smiles."', fecha='".$fecha."', estado='".$estat."', descripcion ='".$descripcio."' where idFarmaco='".$idFarmaco."'";
                    //echo "SIN IMAGEN: ".$sql;

                }
            }
            //echo $sql;
                $resultado=mysqli_query($conexion,$sql);
                $sql="SELECT * from farmacos where idFarmaco='".$idFarmaco."'";
            $resultado=mysqli_query($conexion,$sql);
            //echo $sql;
            while($row = mysqli_fetch_assoc($resultado)) {
            
                            ?>
            <div class="first-body">
                <img class="body-images" src="<?php echo $row["imagen"];?>" alt="imagen proteina"/>
                <div class="inner-first-body"style="margin-left:px;">
                    <div style="width:70%; ">                      
                    <h1 style="text-align:center; text-transform:capitalize;"><?php echo $row["nombre"];?></h1>
                    <form id="form" style="margin-left:0px;" action="editar_farmaco.php" method="post"enctype="multipart/form-data" style="display:flex;flex-wrap:wrap;">
                        <input type="text" class="search-form" value="<?php echo $row["nombre"];?>" name="nom" required/>                        
                        <input type="text" class="search-form" value="<?php echo $row["SMILES"];?>" name="smiles" required/>
                        <input type="text" class="search-form" value="<?php echo $row["InChl"];?>" name="inchl" required/>
                        <input type="text" class="search-form" value="<?php echo $row["estado"];?>" name ="estat"required/>
                        <input type="text" class="search-form" value="<?php echo $row["descripcion"];?>" name="descripcio" required/>
                        <input type="file" class="search-form" style="margin-top:22px; margin-left:20px; width:30%" name="imatge"/>
                        <input type="submit" class="search-button" value="Guardar" />
                        <input name="Enviar" type="reset" value="reset" class="search-button" />
                        <input name="guardar" type="hidden" value="1" />
                        <input type="hidden" value="<?php echo $row["idFarmaco"];?>" name="idFarmaco"></input>
                        <input type="hidden" value="<?php echo $row["nombre"];?>" name="nombre2"></input>
                    </form>
                    </div>
                    <div style="width:30%; display:flex; flex-wrap:wrap">
                        <button class="button" id="eliminar" onclick="eliminar()" style="float:right">Eliminar</button>
                    </div>
                </div>
            </div>   <?php }?>         
        </div>

    <footer class="footer">

        <div class="footer-left">
            <h3>L&S<span>WebProject</span></h3>
            <p class="footer-links">
            <a href="home.php" title="link al home">Home</a>
            <a href="estadisticas.php" title="link a estadisticas">Estadisticas</a>
            <a href="farmacos.php" title="link a farmacos">Farmacos</a>
            <a href="proteinas.php" title="link a proteinas">Proteinas</a>
            <a href="php/listaUsers.php" title="link a users">Users</a>
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
                <span>Sobre la pagina</span>
                Mejor pagina web para guardar y crear farmacos y proteinas :D
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
