<html>
<head>
<meta charset="UTF-8">
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js" integrity="sha384-u/bQvRA/1bobcXlcEYpsEdFVK/vJs3+T+nXLsBYJthmdBuavHvAW6UsmqO2Gd/F9" crossorigin="anonymous"></script>
<title>Casita Baruch</title>
</head>
<body>
<?php
   include("abrir_conexion.php");
   $consulta=$conn->query("SELECT *
      FROM producto");
   $a=$consulta->num_rows;
   //INICIO Tabla
   echo "LISTA DE TORTAS REGISTRADAS";
   echo "<table width=\"100%\" border=\"1\">
   <tr>
   <td><b><center>ID_PRODUCTO</center></b></td>
    <td><b><center>NOMBRE_PRODUCTO</center></b></td>
   <td><b><center>TAMAÑO</center></b></td>
   </tr>";
   //IMPRIMIR RESULTADOS
      for($i=0;$i<$a;$i++){
        $row = mysqli_fetch_array($consulta);
        echo "
        <tr><td>$row[0]</td>
        <td>$row[3]</td>
        <td>$row[1]</td></tr>";
      }//fin for
   //fin tabla
   echo"</table><br><br>";
//SEGUNDA CONSULTA
   echo"LISTA DE INGREDIENTES REGISTRADOS";

   $consulta1=$conn->query("SELECT *
      FROM ingrediente");
   $a=$consulta1->num_rows;
   //INICIO Tabla

   echo "<table width=\"100%\" border=\"1\">
   <tr>
   <td><b><center>NOMBRE INGREDIENTE</center></b></td></tr>";
   //IMPRIMIR RESULTADOS
      for($i=0;$i<$a;$i++){
        $row = mysqli_fetch_array($consulta1);
        echo "
        <tr><td>$row[0]</td></tr>";
      }//fin for
   //fin tabla
   echo"</table><br><br>";

?>

<h2>REGISTE INGREDIENTE</h2> <!--INDICACIONES DE LA BUSQUEDA-->
   <form  method="POST" action="Corresponde.php">  <!--importante el metodo, siempre post y el action en este caso a la misma pagina-->

     <!-- cada div es una casilla, el for del label coincidir con el id del input -->
     <!-- Cada label debe llevar un nombre de la variable a registrar-->
     <div class="form-group">
       <label for="id_p">INGRESE ID DEL PRODUCTO</label>
       <input type="text" class="form-control" name="id_producto" id="id_p" placeholder="INGRESE ID PRODUCTO">
     </div>
     <!-- una casilla--><div class="form-group">
       <label for="nom_p">INGRESE NOMBRE DEL INGREDIENTE</label>
       <input type="text" class="form-control" name="nombre_ingrediente" id="nom_p" placeholder="INGRESE NOMBRE INGREDIENTE">
     </div>

     <button type="submit" class="btn btn-primary" name="btn1">Ingresar</button>
   </form>


 <?php

   if(isset($_POST["btn1"])){
     include("abrir_conexion.php");
     $id_producto=$_POST["id_producto"];
     $nombre_ingrediente=$_POST["nombre_ingrediente"];
     $consulta3=$conn->query("INSERT INTO Corresponde VALUES('$nombre_ingrediente','$id_producto')");
     echo "Datos Ingresados Correctamente";
}
  ?>
  </body>
  </html>
