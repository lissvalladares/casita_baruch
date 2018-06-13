 <html>
 <head>
 <meta charset="UTF-8">
 <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
 <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
 <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js" integrity="sha384-u/bQvRA/1bobcXlcEYpsEdFVK/vJs3+T+nXLsBYJthmdBuavHvAW6UsmqO2Gd/F9" crossorigin="anonymous"></script>
 <title>Casita Baruch</title>
 </head>

 <body>
<p1>INGRESE DATOS DE LA PERSONA A BUSCAR<p1> <!--INDICACIONES DE LA BUSQUEDA-->
   <form  method="POST" action="Consulta3.php">  <!--importante el metodo, siempre post y el action en este caso a la misma pagina-->

     <!-- cada div es una casilla, el for del label coincidir con el id del input -->
     <!-- Cada label debe llevar un nombre de la variable a registrar-->
     <div class="form-group">
       <label for="nombre">Nombre</label>
       <input type="text" class="form-control" name="nombre_1" id="nombre" placeholder="Ingrese Nombre">
     </div>
<!-- una casilla-->
<div class="form-group">
  <label for="apellido1">Apellido Paterno</label>
  <input type="text" class="form-control" name="apellido_1" id="apellido1" placeholder="Ingrese Apellido Paterno">
</div>
<!-- una casilla-->
<div class="form-group">
  <label for="apellido2">Apellido Materno</label>
  <input type="text" class="form-control" name="apellido_2" id="apellido2" placeholder="Ingrese Apellido Materno">
</div>
<!-- una casilla-->
     <button type="submit" class="btn btn-primary" name="btn1">Buscar!!!</button>
   </form>

 <?php

   if(isset($_POST["btn1"])){
     include("abrir_conexion.php"); //hacer la conexion a la base de datos
     $nombre_1=$_POST["nombre_1"]; // a la variable creada en php se le asigna el nombre de la variable del input
     $apellido_1=$_POST["apellido_1"];
     $apellido_2=$_POST["apellido_2"];
     $consulta=$conn->query("SELECT (venta.ingreso_venta - pedido.abono) AS deuda, pedido.estado
FROM cliente, pedido, venta, producto, compuesta
WHERE cliente.rut_cliente=pedido.rut_cliente                 AND
              pedido.numero_boleta=venta.numero_boleta    AND
              compuesta.id_pedido=pedido.id_pedido            and
              compuesta.id_producto=producto.id_producto   and
              cliente.nombre_1='$nombre_1'                         and
              cliente.apellido_1='$apellido_1'                        and
              cliente.apellido_2='$apellido_2'  AND
              pedido.estado !='pagado' 
                               ");

$a=$consulta->num_rows;
//INICIO Tabla
echo "<table width=\"100%\" border=\"1\">
  <tr>
    <td><b><center>Deuda</center></b></td>
    <td><b><center>Estado del Pedido</center></b></td>
  </tr>";
  //IMPRIMIR RESULTADOS
        for($i=0;$i<$a;$i++){
          $row = mysqli_fetch_array($consulta);
          echo "
            <tr><td>$row[0]</td>
            <td>$row[1]</td></tr>";
          }
//fin tabla
echo"</table>";
}//fin isset
?>
  </body>
  </html>
