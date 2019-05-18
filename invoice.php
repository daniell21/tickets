<?php 
session_start();




$mysqli = new mysqli("localhost", "root", "", "ticketly");
$query = "SELECT * FROM loteria";
$result = mysqli_query($mysqli, $query);
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


<p>New York Día</p> 
<p>Real</p> 
<p>Gana Más</p> 
<p>Loteka</p> 
<p>New York Noche</p> 
<p>Quiniela Pale</p> 
<p>Nacional Noche</p> 
<h2>Total:</h2>


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
    while($fila = mysqli_fetch_assoc($result)){
        $id=$fila["id"];
        $monto=$fila["monto"];
        $jugada=$fila["jugada"];


?>
                

                    <input type="hidden" value="<?php echo $id;?>" id="id<?php echo $id;?>">
                    <input type="hidden" value="<?php echo $jugada;?>" id="jugada<?php echo $id;?>">
                    <input type="hidden" value="<?php echo $monto;?>" id="monto<?php echo $id;?>">
                    <tr class="even pointer">
                        <td><?php echo $jugada;?></td>
                        <td><?php echo $monto;?></td>
                    </tr>
                <?php
    }}
                ?>
              </table>
</body>
</html>