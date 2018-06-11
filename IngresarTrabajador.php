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
<form method="POST" action="IngresarTrabajador.php" class="form-inline">   <!--METODO POST Y EL ACTION HACIA QUE PAGINA QUIERO QUE ME DIRIJA-->
  <label for="rut">Rut</label>
  <input type="text" name="rut_trabajador" class="form-control" id="rut">
 <!--un valor-->
 <label for="nom1">Nombre</label>
 <input type="text" name="nombre_trabajador" class="form-control" id="nom1">
<!--un valor-->
<label for="ape1">Apellido</label>
<input type="text" name="apellido_trabajador" class="form-control" id="ape1">
<!--un valor-->
  <!--boton enviar-->
  <input type="submit" value="Enviar" class="btn-btn-sucess" name=enviar>
</form>

<?php
if(isset($_POST["enviar"])){
   include("abrir_conexion.php"); //hacer la conexion a la base de datos
   $rut_trabajador=$_POST["rut_trabajador"];
   $nombre_trabajador=$_POST["nombre_trabajador"]; // a la variable creada en php se le asigna el nombre de la variable del input
   $apellido_trabajador=$_POST["apellido_trabajador"];

  $conn->query("INSERT INTO trabajador VALUES('$rut_trabajador','$nombre_trabajador','$apellido_trabajador')");  //EL SQL QUE APUNTE BIEN

  echo "<p5>Datos Ingresados</p5>";
}//cierre if isset

?>
</body>
</html>
