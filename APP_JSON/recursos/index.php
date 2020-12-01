<?php

$url= "https://d21715ad0897.ngrok.io/RestFulPeliculas/webresources/Peliculas";

//Toda la info que recoge la convierte a cadena
$miVar = file_get_contents($url);

//Decodificar para ser leido por PHP
$decodejson = json_decode($miVar);

echo "Informacion JSON desde url";
echo "<br>";

foreach ($decodejson as $p) {
  echo "Año Produccion: ".$anioProduccion = $p->anioProduccion; //alamacenos lo que leemos del JSON
  echo "<br>";
  echo "Calificacion: ".$calificacion = $p->calificacion;
  echo "<br>";
  echo "Clasificacion: ".$clasificacion = $p->clasificacion;
  echo "<br>";
  echo "Director: ".$director = $p->director;
  echo "<br>";
  echo "Duración: ".$duracion = $p->duracion;
  echo "<br>";
  echo "Formato: ".$formato = $p->formato;
  echo "<br>";
  echo "Género: ".$genero = $p->genero;
  echo "<br>";
  echo "Idioma: ".$idioma = $p->idioma;
  echo "<br>";
  echo "Resumen: ".$resumen = $p->resumen;
  echo "<br>";
  echo "Titulo: ".$titulo = $p->titulo;
  echo "<br>";
  //Este es un objeto que contiene un arreglo:
  echo "Direccion: ";
  echo "<br>";
  $cont = "";
  foreach ($p->direccion as $d) {
    echo $d.".......";
    $cont=$cont." ".$d;
  }
    $con = mysqli_connect("mysql-uchih4jhonathan.alwaysdata.net", "211728", "Uchih4Jhonathan23") or die("Sin conexión");

    mysqli_set_charset($con, "utf8");
    mysqli_select_db($con, "uchih4jhonathan_multicines");

    $consulta = "INSERT INTO pelicula (anioProduccion, calificacion, clasificacion, director, duracion, formato, genero, idioma, resumen, titulo) VALUES
                                      ('$anioProduccion', '$calificacion', '$clasificacion', '$director', '$duracion', '$formato', '$genero', '$idioma', '$resumen', '$titulo')";
    $resultado = mysqli_query($con, $consulta);
    echo "<br>";
}

if($resultado == true){
  echo "<br>";
  echo "Datos guardados!";
}else{
  echo "<br>";
  echo "Error";
}

//Leer datos desde Mysq
echo "<br>";
echo "Datos desde MySql";
$sql = "select * from personal";
$rs = mysqli_query($con, $sql);

while ($row1 = mysqli_fetch_object($rs)){
  $datos[] = $row1;
}

foreach ($datos as $dat) {
  echo "<br>";
  echo $dat->nombre;
  echo "<br>";
}
mysqli_close($con);

 ?>
