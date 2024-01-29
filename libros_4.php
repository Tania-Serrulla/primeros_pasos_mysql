<!DOCTYPE html>
<html>
<head>
<title>libros_1</title>
<style type="text/css">
html,body{
margin:0px;
padding:0px;
width:100%;
height:100%;
background:url(1.jpg);
font-family: Arial
}
form{
	background-color: #009ddc;
	opacity: 95%;
	text-align: center;
	margin-top: 100px;
	margin-left: 100px;
	margin-right: 100px;
	padding-top: 60px;
	padding-bottom: 40px;
	border-radius: 10rem;
}
input{
	width:50%;
	height:50px;
	margin-bottom: 50px;
}
</style>
</head>
<body>
<?php

$conecsion = mysqli_connect('127.0.0.1', 'root', '', 'tienda_de_libros');
$tabla ="SELECT * FROM libros";
$resultao_libros= mysqli_query($conecsion,$tabla);

$tabla2 ="SELECT * FROM clientes";
$resultao_clientes= mysqli_query($conecsion,$tabla2);

header("Content-Type: text/html;charset=utf-8");
if (isset($_POST["selected_libro"])){
		
$selected_libro = $_POST["selected_libro"];
$selected_cliente = $_POST["selected_cliente"];
$fecha = $_POST["fecha"];
$cantidad = $_POST["cantidad"];

try{
$conexion = new PDO ('mysql:host=127.0.0.1;dbname=tienda_de_libros','root','');
$caracteres = $conexion->query("SET NAMES 'utf8'");
$insercion = $conexion->query("INSERT INTO ventas (id_libro, id_cliente, fecha, cantidad) VALUES ('$selected_libro','$selected_cliente','$fecha','$cantidad')");

$insercion = null;
$conexion = null;

}
catch(PDOEXception){
echo "error!!!";
die();
}

?>

<form>
<input type="button" value="+ venta" onClick="location.href='libros_4.php'">
</form>

<?php
}
else{
?>


<form action = "libros_4.php" method = "post" >
<select name="selected_libro">
<option selected>Libro</option>
<?php foreach( $resultao_libros as $libro ){
	echo "<option value='" . $libro['id'] . "'>" . $libro['titulo'] . "</option>";
}
?> 
</select><br>
<br>
<select name="selected_cliente">
<option selected>Cliente</option>
<?php foreach( $resultao_clientes as $libro ){
    echo "<option value='" . $libro['id'] . "'>" . $libro['nombre'] . "</option>";
   }
 ?> 
</select><br>
<br>
<input type="text" name="fecha" placeholder="fecha"><br>
<input type="text" name="cantidad" placeholder="cantidad"><br>
<input type="submit" value="enviar">
</form>
<?php
}
?>

</body>
</html>