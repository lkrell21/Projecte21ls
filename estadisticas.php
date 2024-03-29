<?php include_once('conexionBBDD.php');

$sql = "SELECT COUNT(*), YEAR(FECHA) FROM farmacos GROUP BY YEAR(FECHA)";
    $datosFarmacos = "";
    $labelFarmacos="";
    $labelProteinas="";
    $datosProteinas= "";
    $datosUsuarios = "";
    $labelUsuarios = "";

    $resultado = mysqli_query($conexion, $sql);
    if (mysqli_num_rows($resultado) > 0) {
        while ($row = mysqli_fetch_assoc($resultado)) {
            $datosFarmacos = $datosFarmacos . $row["COUNT(*)"].",";
            $labelFarmacos = $labelFarmacos.'"'. $row["YEAR(FECHA)"].'",';
        }
        $datosFarmacos = rtrim($datosFarmacos, ',');
        $labelFarmacos = rtrim($labelFarmacos,',');   
        //$labelFarmacos = ltrim($labelFarmacos,'"');   
        //echo $datosFarmacos." hola ".$labelFarmacos;
}


$sql = "SELECT COUNT(*), YEAR(FECHA) FROM proteinas GROUP BY YEAR(FECHA)";   
    $resultado = mysqli_query($conexion, $sql);
    if (mysqli_num_rows($resultado) > 0) {
        while ($row = mysqli_fetch_assoc($resultado)) {
            $datosProteinas = $datosProteinas . $row["COUNT(*)"].",";
            $labelProteinas = $labelProteinas."'". $row["YEAR(FECHA)"]."',";
            
        }
        rtrim($datosProteinas, ',');
        rtrim($labelProteinas,',');     
}
$sql = "SELECT COUNT(*), YEAR(fechaAlta) FROM usuarios GROUP BY YEAR(fechaAlta)";   
    $resultado = mysqli_query($conexion, $sql);
    if (mysqli_num_rows($resultado) > 0) {
        while ($row = mysqli_fetch_assoc($resultado)) {
            $datosUsuarios = $datosUsuarios . $row["COUNT(*)"].",";
            $labelUsuarios = $labelUsuarios."'". $row["YEAR(fechaAlta)"]."',";
            //echo "ROW: ".mysqli_num_rows($row);
        }
        //echo $sql;     
}

error_reporting(E_ALL ^ E_NOTICE);
session_start();
$rol="";
$usuario="";
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
    <meta name="title" content="La pagina donde salen las estadisticas de nuestra web">
    <meta name="keywords" content="estadisticas, graficas, proteinas, farmacos, numero, ultimos años">
    <meta name="description" content="En esta pagina podremos ver dos graficas que tratan de los ultimos farmacos subidos a la pagina en los ultimos años y el numero de proteinas descubiertas">
    <link rel="stylesheet" href="css/estadisticas.css">
    <link rel="stylesheet" href="css/general.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    <title>Estadísticas</title>
</head>
<body>
    <header style="background-image: url('img/header3.jpg'); height: 200px;">
        <h1 id="header">Lucas & Sheila webproject</h1>
        <nav style ="margin-top: 55px;">
        <a href="home.php" title="link al home">Home</a>
            <a href="estadisticas.php" title="link a estadisticas">Estadisticas</a>
            <a href="farmacos.php" title="link a farmacos">Farmacos</a>
            <a href="proteinas.php" title="link a proteinas">Proteinas</a>
            <?php if($rol=="administrador"){
            echo '<a href="listaUsers.php" title="link a users">Usuarios</a>';
        }?>

        </nav>
        <?php
        echo $btnLog;
        ?>
        </header>
        
        <div id="body">
            <div class="first-body" style="height:auto">
                <canvas id="myChart" width="100%" heigth="auto"></canvas>
                <script>
                    var ctx = document.getElementById('myChart').getContext('2d');
                  var chart = new Chart(ctx, {
                  type: 'bar',
                  data:{
                  datasets: [{
                 <?php echo "data: [ ".$datosProteinas.",],";?>
                  backgroundColor: ['#A051FF', '#FFC3E5', '#98F59C','#FF9430'],
                  label: 'Nuevas Proteinas'}],
                  labels: [<?php echo $labelProteinas;?>]},
                  options: {scales: {
                                yAxes: [{
                                    ticks: {
                                        beginAtZero: true
                                    }
                                }]
                            },
                            responsive:true,
                            title: {
                          display: true,
                          text: 'Proteínas nuevas por año'
                        }
                            }
                  });
              </script>
            </div>
            <div class="first-body">
                <canvas id="myChart2" width="100%" heigth="auto" style="text-align: center;"></canvas>
                <script>
                    var xValues = [<?php echo  $labelFarmacos;?>];
                    var yValues = [<?php echo  $datosFarmacos;?>];
                    var barColors = [
                      '#A051FF',
                      '#FFC3E5',
                      '#98F59C',
                      '#FF9430',
                    ];
                
                    new Chart('myChart2', {
                      type: 'pie',
                      data: {
                        labels: xValues,
                        datasets: [{
                          backgroundColor: barColors,
                          data: yValues
                        }]
                      },
                      options: {
                        title: {
                          display: true,
                          text: 'Farmacos nuevos por año'
                        }
                      }
                    });
                    </script>          
                </div>
                <div class="first-body">
                <canvas id="myChart3" width="100%" heigth="auto"></canvas>
                <script>
                    var ctx = document.getElementById('myChart3').getContext('2d');
                  var chart3 = new Chart(ctx, {
                  type: 'bar',
                  data:{
                  datasets: [{
                 <?php echo "data: [ ".$datosUsuarios.",],";?>
                  backgroundColor: ['#A051FF', '#FFC3E5', '#98F59C','#FF9430'],
                  label: 'Nuevos Usuarios'}],
                  labels: [<?php echo $labelUsuarios;?>]},
                  options: {scales: {
                                yAxes: [{
                                    ticks: {
                                        beginAtZero: true
                                    }
                                }]
                            },
                            responsive:true,
                            title: {
                          display: true,
                          text: 'Usuarios nuevos por año'
                        }
                            }
                  });
              </script>
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
            <?php if($rol=="administrador"){
            echo '<a href="listaUsers.php" title="link a users">Usuarios</a>';
        }?>
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
