<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/farmacos.css">
    <link rel="stylesheet" href="css/general.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>la pagina que muestra todos los farmacos</title>
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
        <div class="search-body">
            <div id="form-div">
                <form id="form" action="php/consultaFarmacos.php" method="post">
                    <input type="text" class="search-form" placeholder="Nom" />
                    <input type="text" class="search-form" placeholder="Codi" />
                    <input type="text" class="search-form" placeholder="SMILES" />
                    <input type="text" class="search-form" placeholder="InChl" />
                    <input type="text" class="search-form" placeholder="Data" />
                    <input type="text" class="search-form" placeholder="Estat" />
                    <input type="submit" class="search-button" value="Cerca" />
                </form>
            </div>
        </div>
        <div class="menuBotones">
            <a href="crear_farmaco.php" class="barraBotonesLink">
                <button class="btnNormal">Crear fàrmac</button>
            </a>
            <a href="misFarmacos.php" class="barraBotonesLink">
                <button class="btnNormal">Els meus fàrmacs</button>
            </a>
        </div>
        <div class="first-body">
            <img class="body-images" src="img/farmaco.jpg" />
            <div>
                <h1><a href="farmac.php">NOM FÁRMACO</a></h1>
                <p>
                    Lorem, ipsum dolor sit amet consectetur adipisicing elit.</br> Eligendi rerum repellat magnam similique praesentium
                    consectetur odit modi, asperiores, ipsum dolor ex, repellendus delectus.</br> Eligendi architecto eos, unde earum commodi aut.
                </p>
            </div>
        </div>
        <div class="first-body">
            <img class="body-images" src="img/farmaco.jpg" />
            <div>
                <h1><a href="farmac.php">NOM FÁRMACO</a></h1>
                <p>
                    Lorem, ipsum dolor sit amet consectetur adipisicing elit.</br> Eligendi rerum repellat magnam similique praesentium
                    consectetur odit modi, asperiores, ipsum dolor ex, repellendus delectus.</br> Eligendi architecto eos, unde earum commodi aut.
                </p>
                </br>
            </div>
        </div>
        <div class="first-body">
            <img class="body-images" src="img/farmaco.jpg" />
            <div>
                <h1><a href="farmac.php">NOM FÁRMACO</a></h1>
                <p>
                    Lorem, ipsum dolor sit amet consectetur adipisicing elit.</br> Eligendi rerum repellat magnam similique praesentium
                    consectetur odit modi, asperiores, ipsum dolor ex, repellendus delectus.</br> Eligendi architecto eos, unde earum commodi aut.
                </p>
            </div>
        </div>
        <div class="first-body">
            <img class="body-images" src="img/farmaco.jpg" />
            <div>
                <h1><a href="farmac.php">NOM FÁRMACO</a></h1>
                <p>
                    Lorem, ipsum dolor sit amet consectetur adipisicing elit.</br> Eligendi rerum repellat magnam similique praesentium
                    consectetur odit modi, asperiores, ipsum dolor ex, repellendus delectus.</br> Eligendi architecto eos, unde earum commodi aut.
                </p>
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