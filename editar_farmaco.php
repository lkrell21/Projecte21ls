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
    <title>la pagina para editar farmacos</title>
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
                            ?>
            <div class="first-body">
                <img class="body-images" src="img/proteina.jpg" alt="imagen proteina h"/>
                <div class="inner-first-body"style="margin-left:0px;">

                    <button class="buttonEspecial" id="eliminar" onclick="eliminar()">Eliminar</button>                
                    <h1>NOM FÀRMAC</h1>
                    <form id="form" style="margin-left:0px;" action="editarFarmaco" method="post"enctype="multipart/form-data">
                        <input type="text" class="search-form" placeholder="Nom" />                        
                        <input type="text" class="search-form" placeholder="SMILES" />
                        <input type="text" class="search-form" placeholder="InChl" />
                        <input type="text" class="search-form" placeholder="Estat" />
                        <input type="text" class="search-form" placeholder="Descripció" />
                        <input type="file" class="search-form" placeholder="Imatge" style="margin-top:22px; margin-left:20px; "/>
                        <input type="submit" class="search-button" value="Guardar" />
                    </form>

                </div>
            </div>            
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
