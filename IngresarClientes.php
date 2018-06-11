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
<form method="POST" action="IngresarClientes.php" class="form-inline">   <!--METODO POST Y EL ACTION HACIA QUE PAGINA QUIERO QUE ME DIRIJA-->
  <label for="rut">Rut</label>
  <input type="text" name="rut_cliente" class="form-control" id="rut">
 <!--un valor-->
 <label for="nom1">Nombre</label>
 <input type="text" name="nombre_1" class="form-control" id="nom1">
<!--un valor-->
<label for="ape1">Apellido Paterno</label>
<input type="text" name="apellido_1" class="form-control" id="ape1">
<!--un valor-->
<label for="ape2">Apellido Materno</label>
<input type="text" name="apellido_2" class="form-control" id="ape2">
<!--un valor-->
<br><label for="tel">Teléfono</label>
<input type="text" name="telefono" class="form-control" id="tel">
<!--un valor-->
<label for="email">E-mail</label>
<input type="text" name="email" class="form-control" id="email">
<!--un valor-->
<label for="dire">Dirección</label>
<input type="text" name="direccion" class="form-control" id="dire">
<!--un valor-->

  <!--boton enviar-->
  <input type="submit" value="Enviar" class="btn-btn-sucess" name=enviar>
</form>

<?php
if(isset($_POST["enviar"])){
   include("abrir_conexion.php"); //hacer la conexion a la base de datos
   $rut_cliente=$_POST["rut_cliente"];
   $nombre_1=$_POST["nombre_1"]; // a la variable creada en php se le asigna el nombre de la variable del input
   $apellido_1=$_POST["apellido_1"];
   $apellido_2=$_POST["apellido_2"];
   $telefono=$_POST["telefono"];
   $email=$_POST["email"];
   $direccion=$_POST["direccion"];

  $conn->query("INSERT INTO cliente VALUES('$rut_cliente','$nombre_1','$apellido_1','$apellido_2','$telefono','email','direccion')");  //EL SQL QUE APUNTE BIEN

  echo "<p5>Datos Ingresados correctamente, aunque no los ingrese bien va a decir lo mismo</p5>";

  $miweb='<a href="IngresarPedido.php">REGISTRAR EL PEDIDO</a>';

  //INTENTO DE OCUPAR VARIABLES GLOBALES
echo $miweb;
  ob_start();
  $rut_cliente_q_hace_pedido=$rut_cliente;

}//cierre if isset

?>
</body>
</html>
