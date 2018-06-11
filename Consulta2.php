 <html>
 <head>
 <meta charset="UTF-8">
 <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
 <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
 <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js" integrity="sha384-u/bQvRA/1bobcXlcEYpsEdFVK/vJs3+T+nXLsBYJthmdBuavHvAW6UsmqO2Gd/F9" crossorigin="anonymous"></script>
 <title>Casita Baruch</title>
 </head>

 <body>
<p1>PEDIDOS A ENTREGAR EN EL DÍA(INGRESE FECHA DEL DÍA A BUSCAR)<p1> <!--INDICACIONES DE LA BUSQUEDA-->
   <form  method="POST" action="Consulta2.php">  <!--importante el metodo, siempre post y el action en este caso a la misma pagina-->

     <!-- cada div es una casilla, el for del label coincidir con el id del input -->
     <!-- Cada label debe llevar un nombre de la variable a registrar-->
     <div class="form-group">
       <label for="fecha">Fecha</label>
       <input type="text" class="form-control" name="fecha_entrega" id="fecha" placeholder="Ingresar Fecha de Entrega">
     </div>
     <!-- una casilla-->

     <button type="submit" class="btn btn-primary" name="boton">Buscar!!!</button>
   </form>

 <?php

   if(isset($_POST["boton"])){
     include("abrir_conexion.php"); //hacer la conexion a la base de datos
     $fecha_entrega=$_POST["fecha_entrega"]; // a la variable creada en php se le asigna el nombre de la variable del input
     $consulta=$conn->query("SELECT cliente.nombre_1, ciente.apellido_1, ciente.apellido_2,
               pedido.estado, caracteristica.comentario,
              caracteristica.dedicatoria, producto.tamaño, producto.nombre_producto
FROM   cliente, pedido, caracteristica, compuesta, producto
WHERE cliente.rut_cliente = pedido.rut_cliente and
              caracteristica.id_caracteristica = compuesta.id_caracteristica and
             pedido.id_pedido = compuesta.id_pedido and
            producto.id_producto = compuesta.id_producto and
		pedido.fecha_entrega = '$fecha_entrega'");





$a=$consulta->num_rows;
echo "<table width=\"100%\" border=\"1\">
  <tr>
    <td><b><center>Nombre</center></b></td>
      <td><b><center>Apellido Paterno</center></b></td>
        <td><b><center>Apellido Materno</center></b></td>
          <td><b><center>Estado Pedido</center></b></td>
            <td><b><center>Comentario Pedido</center></b></td>
              <td><b><center>Dedicatoria Pedido</center></b></td>
                <td><b><center>Tamaño Torta</center></b></td>
                <td><b><center>Nombre Torta</center></b></td>

  </tr>";
  //IMPRIMIR RESULTADOS
        for($i=0;$i<$a;$i++){
          $row = mysqli_fetch_array($consulta);
          echo "
          <tr><td>$row[0]</td>
          <td>$row[1]</td>
        <td>$row[2]</td>
          <td>$row[3]</td>
            <td>$row[4]</td>
            <td>$row[5]</td>
              <td>$row[6]</td>
      <td>$row[7]</td></tr>";
        }//fin for
//fin tabla
echo"</table>";
}//fin isset


  ?>
  </body>
  </html>
