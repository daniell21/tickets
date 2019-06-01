<?php
require __DIR__ . '/vendor/autoload.php';
//use Spipu\Html2Pdf\Html2Pdf;

if (isset($_POST['print'])) {
    ini_set('log_errors', 1);
    require_once 'invoice.php';
    /*$html = ob_get_clean();

    $html2pdf = new Html2Pdf('P', 'A4', 'es', 'true', 'UTF-8');
    $html2pdf->writeHTML($html);
    $html2pdf->output('ticket.pdf');

    $sql = "delete from loteria";
    $query_new_insert = mysqli_query($con, $sql);
    $sql = "delete from loteriasNombre";
    $query_new_insert = mysqli_query($con, $sql);*/
}

$title = "Tickets | ";
include "head.php";
include "sidebar.php";
$sTable = "loteria";
$count_query   = mysqli_query($con, "SELECT count(*) AS numrows FROM $sTable");
$row = mysqli_fetch_array($count_query);
$numrows = $row['numrows'];


?>
<?php

if (isset($_POST['borrar'])) {
    echo "hola";
}
?>

<div class="right_col" role="main">
    <!-- page content -->
    <div class="">
        <div class="page-title">
            <div class="clearfix"></div>
            <form class="form-horizontal form-label-left input_mask" method="post" id="add" name="add" role="form">


                <?php
                //include("modal/new_ticket.php");
                //include("modal/upd_ticket.php");
                $hoy = date('d-m-Y H:i');
                echo $hoy;
                ?>
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Loterias</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="che" id="checkbox">
                        <div class="row top_tiles">
                            <div class="animated flipInY col-lg- col-md-3 col-sm-6 col-xs-12">
                                <div class="tile-stats">
                                    <div class="form-check">
                                        <input type="checkbox" name="check" class="form-check-input" id="check">
                                        <label class="form-check-label" for="materialUnchecked">New York Dia</label>
                                    </div>
                                </div>
                            </div>
                            <div class="animated flipInY col-lg- col-md-3 col-sm-6 col-xs-12">
                                <div class="tile-stats">
                                    <div class="form-check">
                                        <input type="checkbox" name="check1" class="form-check-input" id="check1">
                                        <label class="form-check-label" for="materialUnchecked">Real</label>
                                    </div>
                                </div>
                            </div>
                            <div class="animated flipInY col-lg- col-md-3 col-sm-6 col-xs-12">
                                <div class="tile-stats">
                                    <div class="form-check">
                                        <input type="checkbox" name="check2" class="form-check-input" id="check2">
                                        <label class="form-check-label" for="materialUnchecked">Gana Mas</label>
                                    </div>
                                </div>
                            </div>
                            <div class="animated flipInY col-lg- col-md-3 col-sm-6 col-xs-12">
                                <div class="tile-stats">
                                    <div class="form-check">
                                        <input type="checkbox" name="check3" class="form-check-input" id="check3">
                                        <label class="form-check-label" for="materialUnchecked">Loteka</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row top_tiles">
                            <div class="animated flipInY col-lg- col-md-3 col-sm-6 col-xs-12">
                                <div class="tile-stats">
                                    <div class="form-check">
                                        <input type="checkbox" name="check4" class="form-check-input" id="check4">
                                        <label class="form-check-label" for="materialUnchecked">New York Noche</label>
                                    </div>
                                </div>
                            </div>
                            <div class="animated flipInY col-lg- col-md-3 col-sm-6 col-xs-12">
                                <div class="tile-stats">
                                    <div class="form-check">
                                        <input type="checkbox" name="check5" class="form-check-input" id="check5">
                                        <label class="form-check-label" for="materialUnchecked">Quiniela Pale</label>
                                    </div>
                                </div>
                            </div>
                            <div class="animated flipInY col-lg- col-md-3 col-sm-6 col-xs-12">
                                <div class="tile-stats">
                                    <div class="form-check">
                                        <input type="checkbox" name="check6" class="form-check-input" id="check6">
                                        <label class="form-check-label" for="materialUnchecked">Nacional Noche</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="result"></div>
                <div class="form-group">
                    <label class="control-label col-md-1 col-sm-3 col-xs-12">Jugada<span class="required">*</span></label>
                    <div class="col-md-2 col-sm-9 col-xs-12">
                        <input type="number" name="jugada" class="form-control" placeholder="Jugada" id="jugada">
                    </div>
                    <label class="control-label col-md-1 col-sm-3 col-xs-12">Monto <span class="required">*</span>
                    </label>
                    <div class="col-md-2 col-sm-9 col-xs-12">
                        <input type="number" name="monto" class="form-control col-md-7 col-xs-12" id="monto" placeholder="Monto" step=".01" id="monto">
                    </div>
                    <div class="col-md-2 col-sm-9 col-xs-12 ">
                        <button id="save_data" type="submit" class="btn btn-success">Agregar</button>
                        <span id="loader"></span>
                    </div>
                    <label class="control-label col-md-2 col-sm-3 col-xs-12">Monto Ticket €
                    </label>
                    <div class="col-md-2 col-sm-9 col-xs-12">
                        <label type="number" class="form-control col-md-7 col-xs-12" placeholder="total" id="total">0.0</label>
                    </div>
                </div>
            </form>
            <div style="display: -webkit-inline-box;float: right;">
                <form action="/ticket/invoice.php" method="POST" target="_blank">
                    <input type="submit" value="Generar Recibo" name="print" class="btn btn-info" />

                </form>
                <form action="" method="POST" id="delete" name="delete">
                    <button type="submit" value="Borraro" class="btn btn-danger">Borrar</button>
                </form>



                <form class="form-horizontal">

                    <div class="col-md-1">
                        <label name="monto" class="form-control col-md-0 col-xs-12" id="q" style="    border: white;
        height: 1px;
        padding: 0;">
                    </div>

                </form>
            </div>

            <div class="x_content">
                <div class="table-responsive">
                    <!-- ajax -->
                    <div id="resultados"></div><!-- Carga los datos ajax -->
                    <div class='outer_div'></div><!-- Carga los datos ajax -->
                    <!-- /ajax -->
                </div>
            </div>

        </div>
    </div>
</div><!-- /page content -->


<?php include "footer.php" ?>


<script type="text/javascript" src="js/ticket.js"></script>

<script>
    $("#add").submit(function(event) {
        $('#save_data').attr("disabled", true);

        var parametros = $(this).serialize();
        $.ajax({
            type: "POST",
            url: "action/addticket.php",
            data: parametros,
            beforeSend: function(objeto) {
                $("#result").html("Mensaje: Cargando...");
            },
            success: function(datos) {
                console.log(datos);
                $("#result").html(datos);
                $('#save_data').attr("disabled", false);
                load(1);
            }
        });

        var uno = document.getElementById("check").checked;
        var dos = document.getElementById("check1").checked;
        var tres = document.getElementById("check2").checked;
        var cuatro = document.getElementById("check3").checked;
        var cinco = document.getElementById("check4").checked;
        var seis = document.getElementById("check5").checked;
        var siete = document.getElementById("check6").checked;
        $contador = 0;

        if (document.getElementById("check").checked) {
            $contador = $contador + 1;
        }
        if (document.getElementById("check1").checked) {
            $contador = $contador + 1;
        }
        if (document.getElementById("check2").checked) {
            $contador = $contador + 1;
        }
        if (document.getElementById("check3").checked) {
            $contador = $contador + 1;
        }
        if (document.getElementById("check4").checked) {
            $contador = $contador + 1;
        }
        if (document.getElementById("check5").checked) {
            $contador = $contador + 1;
        }
        if (document.getElementById("check6").checked) {
            $contador = $contador + 1;
        }


        event.preventDefault();
        var monto = $('#monto').val();
        console.log(uno);
        var lote = false
        $jugada = parseFloat(monto) * $contador;
        if (uno || dos || tres || cuatro || cinco || seis || siete) {
            document.getElementById('total').textContent = parseFloat(document.getElementById('total').textContent) + $jugada;
            lote = true;
        }
        if (document.getElementById("jugada").value >= 0 && document.getElementById("monto").value > 0 && lote) {
            document.getElementById("checkbox").style.visibility = "hidden";
        }
        document.getElementById("jugada").value = '';
        var monto = document.getElementById("monto");
        monto.value = '';

    })


    $("#delete").submit(function(event) {
        $('#delete').attr("disabled", true);

        var parametros = $(this).serialize();
        $.ajax({
            type: "POST",
            url: "action/deleteticket.php",
            data: parametros,
            success: function(datos) {
                console.log(datos);
                $("#result").html(datos);
                $('#save_data').attr("disabled", false);
                load(1);
            }
        });


    })

    function obtener_datos(id) {

        var monto = $("#moto" + id).val();
        var juagada = $("#jugada" + id).val();
        $("#mod_id").val(id);
        $("#mod_title").val(jugada);
        $("#mod_description").val(monto);
    }

    $('#btn').click(function() {
        $('input').each(function() {
            if ($(this).val() != "")
                $(this).val('');
        });
    });
</script>