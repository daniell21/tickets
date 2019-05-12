<?php 

session_start();

include "../config/config.php";//Contiene funcion que conecta a la base de datos
$sql="delete from loteria";
        $query_new_insert = mysqli_query($con,$sql);
        $sql="delete from loteriasNombre";
        $query_new_insert = mysqli_query($con,$sql);
        if ($query_new_insert){
            $messages[] = "La juagada ha sido ingresada satisfactoriamente.";
        } else{
            $errors []= "Lo siento algo ha salido mal intenta nuevamente.".mysqli_error($con);
        }
?>
