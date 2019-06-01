<?php
session_start();
$mysqli = new mysqli("localhost", "root", "", "ticketly");
$query = "SELECT * FROM loteria";
$result = mysqli_query($mysqli, $query);
$queryNombres = "SELECT * FROM loteriasnombre ORDER BY ID DESC LIMIT 1";
$resultNombres = mysqli_query($mysqli, $queryNombres);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Ticket</title>
</head>

<body>
    <div class="container" style="padding-right: 200px;
    padding-left: 200px;">
        <h2 style="text-align: center;">CONSORCIO K.A SPORT. JULIA</h2>
        <h5 style="text-align: center;">
            <?php
            echo date('d M Y h:i A');

            ?></h5>
            <h6 style="text-align: center;">Solidez y Garantía</h6>
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
                <h6>New York Día</h6>
                <?php $contador = $contador + 1;
            } ?>
            <?php if ($real) { ?>
                <h6>Real</h6>
                <?php $contador = $contador + 1;
            } ?>
            <?php if ($ganaMas) { ?>
                <h6>Ganas Más</h6>
                <?php $contador = $contador + 1;
            } ?>
            <?php if ($loteka) { ?>
                <h6>Loteka</h6>
                <?php $contador = $contador + 1;
            } ?>
            <?php if ($neWYorkNoche) { ?>
                <h6>New York Noche</h6>
                <?php $contador = $contador + 1;
            } ?>
            <?php if ($quinielaPale) { ?>
                <h6>Quiniela Pale</h6>
                <?php $contador = $contador + 1;
            } ?>
            <?php if ($nacionalNoche) { ?>
                <h6>Nacional Noche</h6>
                <?php $contador = $contador + 1;
            } ?>
            <hr style="border:1px dotted black;" />
            <h4>Numeros:</h4>
        <?php } else { ?>
            <h2>No hay Datos</h2>
        <?php } ?>
        <div class="container">
            <div class="col-md-6" style="margin: 0 auto;">
                <table class="table table-bordered black">
                    <thead>
                        <tr class="headings">
                            <th style="text-align: center;">Jugada </th>
                            <th style="text-align: center;" >Monto </th>
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
                                <td style="text-align: center;"><?php echo $jugada ?></td>
                                <td style="text-align: center;"><?php echo number_format($monto, 0, '', '.'); ?> €</td>
                            </tr>
                            <?php
                            $total = $total + $monto;
                        }
                        $total = $total * $contador;
                    }
                    ?>
                </table>
            </div>
            <hr style="border:1px dotted black;" />
            <h3 style="text-align: center;"> Total: <?php echo number_format($total, 0, '', '.');?> €</h3>
        </div>
        <h5 style="text-align: center;">Buena Suerte (Caduca a los 30 Días)</h5>
    </div>
</body>
<?php
/* $sql = "delete from loteria";
$result = mysqli_query($mysqli, $sql);
$sqlLoterias = "delete from loteriasNombre";
$result = mysqli_query($mysqli, $sqlLoterias); */
?>

</html>