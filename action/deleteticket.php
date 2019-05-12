<?php 

session_start();

include "../config/config.php";//Contiene funcion que conecta a la base de datos
$sql="delete from loteria";
        $query_new_insert = mysqli_query($con,$sql);
        $sql="delete from loteriasNombre";
        $query_new_insert = mysqli_query($con,$sql);
?>
