<!DOCTYPE html>
<html lang="es">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv= "content-type" content="text/html;charset=es">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="title" content="login de la pagina">
    <meta name="keywords" content="login, registrarse, register, email, Nombre de usuario, contraseña">
    <meta name="description" content="en esta pagina veremos el login y el resgister de la pagina">
    <link rel="stylesheet" href="css/login.css">
    <title>Login de la pagina</title>
</head>
<body>
    <div class="login-wrap">
        <div class="login-html">
            <input id="tab-1" type="radio" name="tab" class="sign-in" checked=""><label for="tab-1" class="tab">Sign In</label>
            <input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">Sign Up</label>
            <div class="login-form">
                <form action="php/login.php" method="post">
                    <div class="sign-in-htm">
                        <div class="group">
                            <label for="user" class="label">Nombre de usuario</label>
                            <input name="usuario" id="user" type="text" class="input" required>
                        </div>
                        <div class="group">
                            <label for="pass" class="label">Contraseña</label>
                            <input id="pass" name="contrasenya" type="password" class="input" data-type="password" required>
                        </div>
                        <div class="group">
                            <input type="checkbox" checked="checked" name="remember"> Recordar usuario
                        </div>
                        <div class="group">
                            <input type="submit" class="button" value="Sign In">
                        </div>
                        <div class="hr"></div>
                        <div class="foot-lnk">
                            <a href="#">Olvidaste la contraseña?</a>
                        </div>
                        <a href="home.php" class="previous round" title="link al home">‹</a>
                    </div>
                </form>
                <div class="sign-up-htm">
                    <div class="group">
                        <label for="user" class="label">Nombre de usuario</label>
                        <input id="user" type="text" class="input">
                    </div>
                    <div class="group">
                        <label for="pass" class="label">Contraseña</label>
                        <input id="pass" type="password" class="input" data-type="password">
                    </div>
                    <div class="group">
                        <label for="pass" class="label">Repetir contraseña</label>
                        <input id="pass" type="password" class="input" data-type="password">
                    </div>
                    <div class="group">
                        <label for="pass" class="label">Correo electronico</label>
                        <input id="pass" type="text" class="input">
                    </div>
                    <a href="login.php" class="google-plus">
                            <span class="fontawesome-google-plus"></span>
                              <i class="fa fa-google-plus" aria-hidden="true"></i>
                    
                    <div class="group">               
                            <input type="submit" class="button" value="Sign Up">
                    </div>
                    <div class="hr"></div>
                    </a><div class="foot-lnk"><a href="login.php" class="google-plus">
                        <label for="tab-1">Ya eres un miembro?</label></a>
                    </div>
                    <a href="home.php" class="previous round" title="link al home">‹</a>
                </div>
            </div>
        </div>
    </div>

</body></html>