<html>
<head>
<meta charset="UTF-8">
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js" integrity="sha384-u/bQvRA/1bobcXlcEYpsEdFVK/vJs3+T+nXLsBYJthmdBuavHvAW6UsmqO2Gd/F9" crossorigin="anonymous"></script>
<title>Casita Baruch</title>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="Home.html">Home</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="Consulta7.php">Info Cliente <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Consulta2_NO HECHA</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="Consulta3.php">Deuda cada Cliente</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="Consulta4.php">Torta más Pedida</a>
        </li>
        </div>
  </nav>
<h3>INGRESE datos del cliente y fecha de la venta ---> QUE PASA SI EL CLIENTE HACE MAS DE una venta EN LA MISMA FECHA??</h3> <!--INDICACIONES DE LA BUSQUEDA-->
  <form  method="POST" action="Consulta8.php">  <!--importante el metodo, siempre post y el action en este caso a la misma pagina-->
    <!-- cada div es una casilla, el for del label coincidir con el id del input -->
    <!-- Cada label debe llevar un nombre de la variable a registrar-->
    <div class="form-group">
      <label for="nombre">Nombre Persona</label>
      <input type="text" class="form-control" name="nombre_1" id="nombre" placeholder="Ingrese Nombre Cliente">
    </div>
    <!-- una casilla-->
    <div class="form-group">
      <label for="ape1">Apellido Paterno</label>
      <input type="text" class="form-control" name="apellido_1" id="ape1" placeholder="Ingrese Apellido Paterno Cliente">
    </div>
        <!-- una casilla-->
        <div class="form-group">
          <label for="ape2">Apellido Materno</label>
          <input type="text" class="form-control" name="apellido_2" id="ape2" placeholder="Ingrese Apellido Materno Cliente">
        </div>
        <!-- una casilla-->
        <div class="form-group">
          <label for="fecha">Fecha_Venta</label>
          <input type="text" class="form-control" name="fecha_venta" id="fecha" placeholder="Ingrese Fecha Pedido">
        </div>

    <button type="submit" class="btn btn-primary" name="btn1">Buscar!!!</button>
  </form>

<?php

  if(isset($_POST["btn1"])){
    include("abrir_conexion.php"); //hacer la conexion a la base de datos
    $nombre_1=$_POST["nombre_1"]; // a la variable creada en php se le asigna el nombre de la variable del input
    $apellido_1=$_POST["apellido_1"];
    $apellido_2=$_POST["apellido_2"];
    $fecha_venta=$_POST["fecha_venta"];
    $consulta=$conn->query("SELECT cajero.nombre_cajero, cajero.apellido_cajero
FROM cliente, pedido, venta, cajero
WHERE cliente.rut_cliente=pedido.rut_cliente                 and
              pedido.numero_boleta= venta.numero_boleta and
              venta.rut_cajero=cajero.rut_cajero                    and
              cliente.nombre_1='$nombre_1'                          and
              cliente.apellido_1='$apellido_1'                         and
              cliente.apellido_2='$apellido_2'                         and
              venta.fecha_venta='$fecha_venta'");



$a=$consulta->num_rows;
//INICIO Tabla
echo "<table width=\"100%\" border=\"1\">
 <tr>
   <td><b><center>Nombre CAJERO</center></b></td>
   <td><b><center>Apellido CAJERO</center></b></td>
 </tr>";
 //IMPRIMIR RESULTADOS
       for($i=0;$i<$a;$i++){
         $row = mysqli_fetch_array($consulta);
         echo "
           <tr><td>$row[0]</td>
           <td>$row[1]</td></tr>";
       }//fin for
//fin tabla
echo"</table>";
}//fin isset
 ?>
 </body>
 </html>
