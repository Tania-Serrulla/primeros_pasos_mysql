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

header("Content-Type: text/html;charset=utf-8");
if (isset($_POST["nombre"])){
		
$titulo = $_POST["titulo"];
$autor = $_POST["autor"];
$genero = $_POST["genero"];
$color = $_POST["precio"];

try{
$conexion = new PDO ('mysql:host=127.0.0.1;dbname=tienda_de_libros','root','');
$caracteres = $conexion->query("SET NAMES 'utf8'");
$insercion = $conexion->query("INSERT INTO libros (nombre, autor, genero, precio) VALUES ('$titulo','$autor','$genero''$precio')");

$insercion = null;
$conexion = null;

}
catch(PDOEXception){
echo "error!!!";
die();
}

?>

<form>
<input type="button" value="+ libros" onClick="location.href='libros_1.php'">
</form>

<?php
}
else{
?>


<form action = "libros_1.php" method = "post" >
<input type="text" name="titulo" placeholder="titulo"><br>
<input type="text" name="autor" placeholder="autor"><br>
<input type="text" name="genero" placeholder="genero"><br>
<input type="number" name="precio" placeholder="precio"><br>
<input type="submit" value="enviar">
</form>
<?php
}
?>

</body>
</html>