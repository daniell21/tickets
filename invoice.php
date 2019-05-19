<?php 
session_start();




$mysqli = new mysqli("localhost", "root", "", "ticketly");
$query = "SELECT * FROM loteria";
$result = mysqli_query($mysqli, $query);
$queryNombres = "SELECT * FROM loteriasnombre ORDER BY ID DESC LIMIT 1";
$resultNombres = mysqli_query($mysqli, $queryNombres);
//$result = $mysqli->query("SELECT * AS _message FROM loteria");
//$row = $result->fetch_assoc();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ticket</title>
</head>
<body>

<h1>CONSORCIO K.A SPORT. JULIA</h1>

<?php
if (mysqli_num_rows($resultNombres) > 0) {
    $total = 0;
    while($fila = mysqli_fetch_assoc($resultNombres)){
        $id=$fila["id"];
        $newYorkDia=$fila["NYD"];
        $real=$fila["R"];
        $ganaMas=$fila["GM"];
        $loteka=$fila["L"];
        $neWYorkNoche=$fila["NYN"];
        $quinielaPale=$fila["QP"];
        $nacionalNoche=$fila["NN"];

    }

?>
<?php if ($newYorkDia){ ?>
<p>New York Día</p> 
<?php }?>
<?php if ($real){ ?>
<p>Real</p> 
<?php }?>
<?php if ($ganaMas){ ?>
<p>Ganas Más</p> 
<?php }?>
<?php if ($loteka){ ?>
<p>Loteka</p> 
<?php }?>
<?php if ($neWYorkNoche){ ?>
<p>New York Noche</p> 
<?php }?>
<?php if ($quinielaPale){ ?>
<p>Quiniela Pale</p> 
<?php }?>
<?php if ($nacionalNoche){ ?>
<p>Nacional Noche</p> 
<?php }?>

<?php } else {?>
<h1>No hay Datos</h1>
<?php }?>

<table class="table table-striped jambo_table bulk_action">
                <thead>
                    <tr class="headings">
                        <th class="column-title">Jugada </th>
                        <th class="column-title">Monto </th>
                        <th class="column-title no-link last"><span class="nobr"></span></th>
                    </tr>
                </thead>

                
<?php
if (mysqli_num_rows($result) > 0) {
    $total = 0;
    while($fila = mysqli_fetch_assoc($result)){
        $id=$fila["id"];
        $monto=$fila["monto"];
        $jugada=$fila["jugada"];


?>
              
                    <tr class="even pointer">
                        <td><?php echo $jugada;?></td>
                        <td><?php echo $monto;?></td>
                    </tr>
                <?php
    }
            $total = $total + $monto;
    
}

                ?>
              </table>
              <?php if(isset($total)) { ?>
              <p>Total:</p> <?php  echo $total;}?>
</body>
</html>