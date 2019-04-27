<?php
    $title ="Tickets | ";
    include "head.php";
    include "sidebar.php";
?>

    <div class="right_col" role="main"><!-- page content -->
        <div class="">
            <div class="page-title">
                <div class="clearfix"></div>
                <div class="col-md-12 col-sm-12 col-xs-12">
                
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
                        <div class="x_panel">
                        <div class="row top_tiles">
                            <div class="animated flipInY col-lg- col-md-3 col-sm-6 col-xs-12">
                                <div class="tile-stats">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="materialUnchecked">
                                        <label class="form-check-label" for="materialUnchecked">New York Dia</label>
                                    </div>
                                </div>
                            </div>
                            <div class="animated flipInY col-lg- col-md-3 col-sm-6 col-xs-12">
                                <div class="tile-stats">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="materialUnchecked">
                                        <label class="form-check-label" for="materialUnchecked">Real</label>
                                    </div>
                                </div>
                            </div>
                            <div class="animated flipInY col-lg- col-md-3 col-sm-6 col-xs-12">
                                <div class="tile-stats">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="materialUnchecked">
                                        <label class="form-check-label" for="materialUnchecked">Gana mas</label>
                                    </div>
                                </div>
                            </div>
                            <div class="animated flipInY col-lg- col-md-3 col-sm-6 col-xs-12">
                                <div class="tile-stats">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="materialUnchecked">
                                        <label class="form-check-label" for="materialUnchecked">Loteka</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row top_tiles">
                            <div class="animated flipInY col-lg- col-md-3 col-sm-6 col-xs-12">
                                <div class="tile-stats">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="materialUnchecked">
                                        <label class="form-check-label" for="materialUnchecked">New York Noche</label>
                                    </div>
                                </div>
                            </div>
                            <div class="animated flipInY col-lg- col-md-3 col-sm-6 col-xs-12">
                                <div class="tile-stats">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="materialUnchecked">
                                        <label class="form-check-label" for="materialUnchecked">Quiniela Pale</label>
                                    </div>
                                </div>
                            </div>
                            <div class="animated flipInY col-lg- col-md-3 col-sm-6 col-xs-12">
                                <div class="tile-stats">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="materialUnchecked">
                                        <label class="form-check-label" for="materialUnchecked">Nacional Noche</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                        <!-- form seach -->
                        <form class="form-horizontal" role="form" id="gastos">
                            <div class="form-group row">
                                <label for="q" class="col-md-1 control-label">Jugada</label>
                                <div class="col-md-2">
                                    <input type="text" class="form-control" id="q"onkeyup='load(1);'>
                                </div>
                                <label for="q" class="col-md-1 control-label">Monto</label>
                                <div class="col-md-2">
                                    <input type="text" class="form-control" id="q" onkeyup='load(1);'>
                                </div>
                                <div class="col-md-2">
                                    <button type="button" class="btn btn-default" onclick='load(1);'>
                                        <span class="glyphicon glyphicon-search" ></span> Agregar</button>
                                    <span id="loader"></span>
                                </div>
                                <label for="q" class="col-md-2 control-label">Monto Ticket $</label>
                                <div class="col-md-2">
                                    <input type="text" class="form-control" id="q"onkeyup='load(1);'>
                                </div>
                            </div>
                        </form>     
                        <!-- end form seach -->


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
            </div>
        </div>
    </div><!-- /page content -->

<?php include "footer.php" ?>

<script type="text/javascript" src="js/ticket.js"></script>
<script type="text/javascript" src="js/VentanaCentrada.js"></script>
<script>
$("#add").submit(function(event) {
  $('#save_data').attr("disabled", true);
  
 var parametros = $(this).serialize();
     $.ajax({
            type: "POST",
            url: "action/addticket.php",
            data: parametros,
             beforeSend: function(objeto){
                $("#result").html("Mensaje: Cargando...");
              },
            success: function(datos){
            $("#result").html(datos);
            $('#save_data').attr("disabled", false);
            load(1);
          }
    });
  event.preventDefault();
})


$( "#upd" ).submit(function( event ) {
  $('#upd_data').attr("disabled", true);
  
 var parametros = $(this).serialize();
     $.ajax({
            type: "POST",
            url: "action/updticket.php",
            data: parametros,
             beforeSend: function(objeto){
                $("#result2").html("Mensaje: Cargando...");
              },
            success: function(datos){
            $("#result2").html(datos);
            $('#upd_data').attr("disabled", false);
            load(1);
          }
    });
  event.preventDefault();
})

    function obtener_datos(id){
        var description = $("#description"+id).val();
        var title = $("#title"+id).val();
        var kind_id = $("#kind_id"+id).val();
        var project_id = $("#project_id"+id).val();
        var category_id = $("#category_id"+id).val();
        var priority_id = $("#priority_id"+id).val();
        var status_id = $("#status_id"+id).val();
            $("#mod_id").val(id);
            $("#mod_title").val(title);
            $("#mod_description").val(description);
            $("#mod_kind_id").val(kind_id);
            $("#mod_project_id").val(project_id);
            $("#mod_category_id").val(category_id);
            $("#mod_priority_id").val(priority_id);
            $("#mod_status_id").val(status_id);
        }

</script>