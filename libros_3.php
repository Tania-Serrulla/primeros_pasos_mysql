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

header("Content-Type: text/html;charset=utf-8");
if (isset($_POST["selected_libro"])){
		
$libro = $_POST["selected_libro"];
$precio = $_POST["precio"];

try{
$conexion = new PDO ('mysql:host=127.0.0.1;dbname=tienda_de_libros','root','');
$caracteres = $conexion->query("SET NAMES 'utf8'");
$insercion = $conexion->query("UPDATE libros SET precio = $precio WHERE id = $libro; ");

$insercion = null;
$conexion = null;

}
catch(PDOEXception){
echo "error!!!";
die();
}

?>

<form>
<input type="button" value="volver" onClick="location.href='libros_3.php'">
</form>

<?php
}
else{
?>


<form action = "libros_3.php" method = "post" >
<select name="selected_libro">
<option selected>Libro</option>
<?php foreach( $resultao_libros as $libro ){
	echo "<option value='" . $libro['id'] . "'>" . $libro['titulo'] . "</option>";
}
?> 
</select><br>
<br>
<input type="number" name="precio" placeholder="precio"><br>
<input type="submit" value="enviar">
</form>
<?php
}
?>

</body>
</html>