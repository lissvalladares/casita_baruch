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
   <form  method="POST" action="Consulta1.php">  <!--importante el metodo, siempre post y el action en este caso a la misma pagina-->

     <!-- cada div es una casilla, el for del label coincidir con el id del input -->
     <!-- Cada label debe llevar un nombre de la variable a registrar-->
     <div class="form-group">
       <label for="nombre">Nombre</label>
       <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre Persona">
     </div>
     <!-- una casilla-->

     <button type="submit" class="btn btn-primary" name="btn1">Buscar!!!</button>
   </form>

 <?php

   if(isset($_POST["btn1"])){
     include("abrir_conexion.php"); //hacer la conexion a la base de datos
     $nombre=$_POST["nombre"]; // a la variable creada en php se le asigna el nombre de la variable del input
     $consulta=$conn->query("SELECT * FROM venta WHERE nombre='$nombre'");





//3 CODIGOS QUE FUNCIONAN PARA IMPRIMIR

/* CODIGO WHILE
     while($rows=mysqli_fetch_array($consulta)){
       echo "Rut=".$rows["rut"]."";
       echo "Nombre=".$rows["nombre"]."<br>";         //deberia funcionar si la fila es el nombre de la columna en la tabla sql
     }//fin while
        }//cierre if isset


  CODIGO for
$a=$consulta->num_rows;
  for($i=0;$i<$a;$i++){
    $row = mysqli_fetch_array($consulta);
    echo "rut=".$row[0]."  ";
    echo "nombre=".$row[1]."<br>";
  } //FIN for
}//cierre if isset



CODIGO FOR CON TABLA!!!!!
$a=$consulta->num_rows;
//INICIO Tabla
echo "<table width=\"100%\" border=\"1\">
  <tr>   //Definir los atributos de la tabla cada td es una atributo
    <td><b><center>Deuda</center></b></td>
    <td><b><center>Estado del Pedido</center></b></td>
  </tr>";
  //IMPRIMIR RESULTADOS
        for($i=0;$i<$a;$i++){
          $row = mysqli_fetch_array($consulta);
          echo "              //imprimir cada fila, cada tr es una tupla de datos
          <tr><td>$row[0]</td>              //solo funciona con el numero del array para hacer las tablas
          <td>$row[1]</td></tr>";
        }//fin for
//fin tabla
echo"</table>";
}//fin isset

        */
  ?>





  </body>
  </html>
