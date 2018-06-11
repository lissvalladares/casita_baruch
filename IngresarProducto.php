<html>
<head>
<meta charset="UTF-8">
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js" integrity="sha384-u/bQvRA/1bobcXlcEYpsEdFVK/vJs3+T+nXLsBYJthmdBuavHvAW6UsmqO2Gd/F9" crossorigin="anonymous"></script>
<title>Casita Baruch</title>
</head>

<body>
  INGRESAR INFO TIENE OTRO FORMULARIO, MAS SENCILLO
<form method="POST" action="IngresarProducto.php" class="form-inline">   <!--METODO POST Y EL ACTION HACIA QUE PAGINA QUIERO QUE ME DIRIJA-->
  <label for="id">ID_PRODUCTO</label>
  <input type="text" name="id_producto" class="form-control" id="id">
 <!--un valor-->
 <label for="tamano">Tamaño</label>
 <input type="text" name="tamano" class="form-control" id="tamano">
<!--un valor-->
<label for="precio">Precio</label>
<input type="text" name="precio" class="form-control" id="precio">
<!--un valor-->
<label for="nombre_prod">Nombre Producto</label>
<input type="text" name="nombre_producto" class="form-control" id="nobmre_prod">
  <!--boton enviar-->
  <input type="submit" value="Enviar" class="btn-btn-sucess" name=enviar>
</form>

<?php
if(isset($_POST["enviar"])){
   include("abrir_conexion.php"); //hacer la conexion a la base de datos
   $id_producto=$_POST["id_producto"];
   $tamano=$_POST["tamano"]; // a la variable creada en php se le asigna el nombre de la variable del input
   $precio=$_POST["precio"];
   $nombre_producto=$_POST["nombre_producto"];

  $conn->query("INSERT INTO producto VALUES('$id_producto','$tamano','$precio','$nombre_producto')");  //EL SQL QUE APUNTE BIEN

  echo "<p5>Datos Ingresados</p5><br><br>";


//<center><h2><b><a href="Corresponde.php">REGISTRAR INGREDIENTES DE LA NUEVA TORTA</a></h2></b></center>
$miweb='<a href="Corresponde.php">REGISTRAR INGREDIENTES DE LA NUEVA TORTA</a>';
echo $miweb;

}//cierre if isset
?>



</body>
</html>
