<?php
 session_start();

 if (!empty($_SESSION['id']) && !empty($_SESSION['pass'])) {
  
 require_once 'LIGA3/LIGA.php'; 
  
  HTML::cabeceras(array('title'=>'Sistema seguro', 'description'=>'Lo que sea...'));
  
  
  
  $body = array('contenedor'=>array('uno'=>'<p>Usuario válido</p>','dos'=>'<a href="cerrar.php">Cerrar sesión</a>'));
  
  
$usuario = "root";
$contrasena = "";
$servidor = "localhost";
$basededatos = "base";

	
$conexion = mysqli_connect( $servidor, $usuario, "" );
$db = mysqli_select_db( $conexion, $basededatos );
$consulta = "SELECT nombre,fecha FROM usuarios";
$resultado = mysqli_query( $conexion, $consulta );

echo "<table borde='2'>";
echo "<tr>";
echo "<th>Nombre</th>";
echo "<th>Fecha de registro</th>";
echo "</tr>";
while ($columna = mysqli_fetch_array( $resultado ))
{
 echo "<tr>";
 echo "<td>" . $columna['nombre'] . "</td><td>" . $columna['fecha'] . "</td>";
 echo "</tr>";
}
echo "</table>";

mysqli_close( $conexion );
  
  
  HTML::cuerpo($body);
  
  HTML::pie();
 } else {
    //echo 'Área prohibida';
    header('Location: .?error=1');
 }