<?php
session_start();

// Conectar a la base de datos
$conectar = mysqli_connect("host", "username", "password", "database_name");

// Verificar la conexión a la base de datos
if (!$cononectar) {
  die("Conexión fallida: " . mysqli_connect_error());
}

// Recuperar información del usuario actual
$user_id = $_SESSION['user_id'];
$query = "SELECT user_type FROM users WHERE id = '$user_id'";
$result = mysqli_query($conectar, $query);
$user = mysqli_fetch_assoc($result);

// Verificar el tipo de usuario y mostrar o ocultar elemento
if ($user['user_type'] == 'admin') {
  // Mostrar elemento para el usuario administrador
  echo '<div>Elemento para el administrador</div>';
} else {
  // Ocultar elemento para otros usuarios
  echo '<div style="display:none;">Elemento oculto</div>';
}

// Cerrar la conexión a la base de datos
mysqli_close($conectar);
?>
