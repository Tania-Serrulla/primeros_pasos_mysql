<!doctype html>
<html>
<head>
<title>libros_2</title>
<style type="text/css">
html,body{
margin:0px;
padding:0px;
width:100%;
height:100%;
background:url(1.jpg);
font-family: Arial
}
table, td, th{border: 1px solid; border:#009ddc}
table{
  border-collapse: collapse;
  width: 100%;
  text-align: center;
}
th, td{padding: 10px 20px;}
td{background: #e5e5e5;}
th{background: #009ddc;color: #fff;}
img{
  width: 100px;
  height: 100px;
  border-radius: 50%;
}
div{
  padding:20px;
  background: #009ddc;
}
caption{
  color: white;
  font-size: 20px;
  font-weight: bold;
}
hr{color: white;}
</style>
</head>
<body>


<div>
<table>
<tr>
<caption>libros disponibles en la tienda
<br>
<br>
<hr>
<br>
</caption>
<th>nombre del libro</th>
<th>autor del libro</th>
<th>genero del libro</th>
<th>precio del libro</th>
</tr>

<?php
$conecsion = mysqli_connect('127.0.0.1', 'root', '', 'tienda_de_libros');

$tabla ="SELECT * from libros";
$resultao= mysqli_query($conecsion,$tabla);
while($datos=mysqli_fetch_array($resultao)){
?>
<tr>
<td><?php echo $datos['titulo']; ?></td>
<td><?php echo $datos['autor']; ?></td>
<td><?php echo $datos['genero']; ?></td>
<td><?php echo $datos['precio']; ?></td>
</tr>
<tr>
<th></th>
<th></th>
</tr>
<?php
}
?>
</table>
</div>


<div>
<table>
<tr>
<caption>clientes registrados en la base de datos
<br>
<br>
<hr>
<br>
</caption>
<th>nombre del cliente</th>
<th>direcsion del cliente</th>
<th>gmail del cliente</th>
<th>telefono del cliente</th>
</tr>

<?php
$conecsion2 = mysqli_connect('127.0.0.1', 'root', '', 'tienda_de_libros');

$tabla2 ="SELECT * from clientes";
$resultao2= mysqli_query($conecsion2,$tabla2);
while($datos2=mysqli_fetch_array($resultao2)){
?>
<tr>
<td><?php echo $datos2['nombre']; ?></td>
<td><?php echo $datos2['direcsion']; ?></td>
<td><?php echo $datos2['gmail']; ?></td>
<td><?php echo $datos2['telefono']; ?></td>
</tr>
<tr>
<th></th>
<th></th>
</tr>
<?php
}
?>
</table>
</div>


<div>
<table>
<tr>
<caption>ventas realizadas
<br>
<br>
<hr>
<br>
</caption>
<th>id</th>
<th>cliente</th>
<th>titulo</th>
<th>fecha de la compra</th>
<th>cantidad</th>
</tr>

<?php
$conecsion3 = mysqli_connect('127.0.0.1', 'root', '', 'tienda_de_libros');

$tabla3 ="SELECT ventas.id, clientes.nombre, libros.titulo, ventas.fecha, ventas.cantidad
FROM ventas 
INNER JOIN clientes ON clientes.id = ventas.id_cliente
INNER JOIN libros ON libros.id = ventas.id_libro;";
$resultao3= mysqli_query($conecsion3,$tabla3);
while($datos3=mysqli_fetch_array($resultao3)){
?>
<tr>
<td><?php echo $datos3['id']; ?></td>
<td><?php echo $datos3['nombre']; ?></td>
<td><?php echo $datos3['titulo']; ?></td>
<td><?php echo $datos3['fecha']; ?></td>
<td><?php echo $datos3['cantidad']; ?></td>
</tr>
<tr>
<th></th>
<th></th>
</tr>
<?php
}
?>
</table>
</div>

<div>
<table>
<tr>
<caption>Precio medio genero estrategia y tácticas militares
<br>
<br>
<hr>
<br>
</caption>
<th>genero</th>
<th>precio_medio</th>
</tr>

<?php
$conecsion4 = mysqli_connect('127.0.0.1', 'root', '', 'tienda_de_libros');

$tabla4 ="SELECT genero, AVG(precio) AS precio_medio FROM libros WHERE genero = 'estrategia y tácticas militares';";
$resultao4= mysqli_query($conecsion4,$tabla4);
while($datos4=mysqli_fetch_array($resultao4)){
?>
<tr>
<td><?php echo $datos4['genero']; ?></td>
<td><?php echo $datos4['precio_medio']; ?></td>
</tr>
<tr>
<th></th>
<th></th>
</tr>
<?php
}
?>
</table>
</div>

<div>
<table>
<tr>
<caption>Libros vendidos entre 2020/02/25 y 2024/01/28
<br>
<br>
<hr>
<br>
</caption>
<th>id</th>
<th>cliente</th>
<th>titulo</th>
<th>fecha de la compra</th>
<th>cantidad</th>
</tr>

<?php
$conecsion5 = mysqli_connect('127.0.0.1', 'root', '', 'tienda_de_libros');

$tabla5 ="SELECT ventas.id, clientes.nombre, libros.titulo, ventas.fecha, ventas.cantidad
FROM ventas 
INNER JOIN clientes ON clientes.id = ventas.id_cliente
INNER JOIN libros ON libros.id = ventas.id_libro
WHERE ventas.fecha BETWEEN '2020/02/25' AND '2024/01/28';";
$resultao5= mysqli_query($conecsion5,$tabla5);
while($datos5=mysqli_fetch_array($resultao5)){
?>
<tr>
<td><?php echo $datos5['id']; ?></td>
<td><?php echo $datos5['nombre']; ?></td>
<td><?php echo $datos5['titulo']; ?></td>
<td><?php echo $datos5['fecha']; ?></td>
<td><?php echo $datos5['cantidad']; ?></td>
</tr>
<tr>
<th></th>
<th></th>
</tr>
<?php
}
?>
</table>
</div>

<div>
<table>
<tr>
<caption>Cliente con más compras realizadas
<br>
<br>
<hr>
<br>
</caption>
<th>id</th>
<th>cliente</th>
<th>titulo</th>
<th>fecha de la compra</th>
<th>cantidad</th>
</tr>

<?php
$conecsion6 = mysqli_connect('127.0.0.1', 'root', '', 'tienda_de_libros');

$tabla6 ="SELECT ventas.id, clientes.nombre, libros.titulo, ventas.fecha, SUM(ventas.cantidad) AS total_cantidad
FROM ventas 
INNER JOIN clientes ON clientes.id = ventas.id_cliente
INNER JOIN libros ON libros.id = ventas.id_libro
GROUP BY ventas.id_cliente
ORDER BY total_cantidad DESC 
LIMIT 1";
$resultao6= mysqli_query($conecsion6,$tabla6);
while($datos6=mysqli_fetch_array($resultao6)){
?>
<tr>
<td><?php echo $datos6['id']; ?></td>
<td><?php echo $datos6['nombre']; ?></td>
<td><?php echo $datos6['titulo']; ?></td>
<td><?php echo $datos6['fecha']; ?></td>
<td><?php echo $datos6['total_cantidad']; ?></td>
</tr>
<tr>
<th></th>
<th></th>
</tr>
<?php
}
?>
</table>
</div>

</body>
</html>