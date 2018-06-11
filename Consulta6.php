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
          <a class="nav-link" href="Consulta1.php">Info Cliente <span class="sr-only">(current)</span></a>
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
<h5>INGRESE INTERVALO DE FECHAS A CONSULTAR(FECHAS QUE OCURRE LA VENTA!!!!)</h5> <!--INDICACIONES DE LA BUSQUEDA-->
  <form  method="POST" action="Consulta6.php">  <!--importante el metodo, siempre post y el action en este caso a la misma pagina-->
    <!-- cada div es una casilla, el for del label coincidir con el id del input -->
    <!-- Cada label debe llevar un nombre de la variable a registrar-->
    <div class="form-group">
      <label for="fecha_ini">Fecha de Venta, Inicio de la consulta</label>
      <input type="text" class="form-control" name="fecha_venta_inicio" id="fecha_ini" placeholder="Ingrese Fecha Inicio">
    </div>
    <!-- una casilla-->
    <div class="form-group">
      <label for="fecha_fin">Fecha de Venta, fin de la consulta</label>
      <input type="text" class="form-control" name="fecha_venta_fin" id="fecha_fin" placeholder="Ingrese Fecha Fin">
    </div>
    <!-- una casilla-->
    <button type="submit" class="btn btn-primary" name="btn1">Buscar!!!</button>
  </form>

<?php

  if(isset($_POST["btn1"])){
    include("abrir_conexion.php"); //hacer la conexion a la base de datos
    $fecha_venta_inicio=$_POST["fecha_venta_inicio"]; // a la variable creada en php se le asigna el nombre de la variable del input
    $fecha_venta_fin=$_POST["fecha_venta_fin"];
    $consulta=$conn->query("SELECT SUM(ingreso_venta) AS ingresos_del_periodo
FROM venta
WHERE fecha_venta>= '$fecha_venta_inicio'               AND
              fecha_venta<= '$fecha_venta_fin'");



$a=$consulta->num_rows;
//INICIO Tabla
echo "<table width=\"100%\" border=\"1\">
 <tr>
   <td><b><center>Ingresos Totales por Ventas</center></b></td>
 </tr>";
 //IMPRIMIR RESULTADOS
       for($i=0;$i<$a;$i++){
         $row = mysqli_fetch_array($consulta);
         echo "<tr><td>$row[0]</td></tr>";
       }//fin for
//fin tabla
echo"</table>";
}//fin isset
 ?>
 </body>
 </html>
