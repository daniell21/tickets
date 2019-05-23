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

    <h1 style="text-align: center;">CONSORCIO K.A SPORT. JULIA</h1>
    <h3 style="text-align: center;">
        <?php
        echo date('d M Y h:i A');

        ?></h3>
    <?php
    if (mysqli_num_rows($resultNombres) > 0) {
        $total = 0;
        while ($fila = mysqli_fetch_assoc($resultNombres)) {
            $id = $fila["id"];
            $newYorkDia = $fila["NYD"];
            $real = $fila["R"];
            $ganaMas = $fila["GM"];
            $loteka = $fila["L"];
            $neWYorkNoche = $fila["NYN"];
            $quinielaPale = $fila["QP"];
            $nacionalNoche = $fila["NN"];
        }
        $contador = 0;
        ?>

        <hr style="border:1px dotted black;" />
        <h4>Loteria:</h4>
        <?php if ($newYorkDia) { ?>
            <h4>New York Día</h4>
            <?php $contador = $contador + 1;
        } ?>
        <?php if ($real) { ?>
            <h4>Real</h4>
            <?php $contador = $contador + 1;
        } ?>
        <?php if ($ganaMas) { ?>
            <h4>Ganas Más</h4>
            <?php $contador = $contador + 1;
        } ?>
        <?php if ($loteka) { ?>
            <h4>Loteka</h4>
            <?php $contador = $contador + 1;
        } ?>
        <?php if ($neWYorkNoche) { ?>
            <h4>New York Noche</h4>
            <?php $contador = $contador + 1;
        } ?>
        <?php if ($quinielaPale) { ?>
            <h4>Quiniela Pale</h4>
            <?php $contador = $contador + 1;
        } ?>
        <?php if ($nacionalNoche) { ?>
            <h4>Nacional Noche</h4>
            <?php $contador = $contador + 1;
        } ?>
        <hr style="border:1px dotted black;" />
        <h4>Numeros:</h4>
    <?php } else { ?>
        <h2>No hay Datos</h2>
    <?php } ?>
    <div>

        <table cellspacing="4" cellpadding="2" width="100%" style="align=center">
            <thead>
                <tr class="headings">
                    <th style="align=center;" class="column-title">Jugada </th>
                    <th><p style="color:white;">s</p></th>
                    <th><p style="color:white;">s</p></th>
                    <th style="align=center;" class="column-title">Monto </th>
                    <th class="column-title no-link last"><span class="nobr"></span></th>
                </tr>
            </thead>


            <?php
            if (mysqli_num_rows($result) > 0) {
                $total = 0;
                while ($fila = mysqli_fetch_assoc($result)) {
                    $id = $fila["id"];
                    $monto = $fila["monto"];
                    $jugada = $fila["jugada"];


                    ?>

                    <tr class="even pointer">
                        <td style="align=center;">
                            <h4 style="padding: 1px;"><?php echo $jugada; ?> </h4>
                        </td>
                        <td><p style="color:white;">esto puede ser si</p></td>
                        <td><p style="color:white;">esto puede ser si</p></td>
                        <td style="align=center;">
                            <h4>€ <?php echo number_format($monto, 0, '', '.'); ?></h4>
                        </td>
                    </tr>
                    <?php
                    $total = $total + $monto;
                }
                $total = $total * $contador;
            }

            ?>
        </table>
    </div>
    <?php if (isset($total)) { ?>
        <h3 style="text-align: center;display:inline;">Total: € <?php echo number_format($total, 0, '', '.'); ?></h3><?php } ?>
</body>

<?php
$sql = "delete from loteria";
$result = mysqli_query($mysqli, $sql);
$sqlLoterias = "delete from loteriasNombre";
$result = mysqli_query($mysqli, $sqlLoterias);
?>

</html>