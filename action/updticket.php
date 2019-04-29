<?php
	session_start();
	if (empty($_POST['mod_id'])) {
           $errors[] = "ID vacío";
        } else if (empty($_POST['jugada'])){
			$errors[] = "jugada vacía";
		} else if (empty($_POST['monto'])){
			$errors[] = "monto vacío";
		}  else if (
			!empty($_POST['jugada']) &&
			!empty($_POST['monto'])
		){

		include "../config/config.php";//Contiene funcion que conecta a la base de datos



		$jugada = $_POST["jugada"];
		$monto = $_POST["monto"];

		//$sql = "update ticket set title=\"$title\",category_id=\"$category_id\",project_id=\"$project_id\",priority_id=\"$priority_id\",description=\"$description\",status_id=\"$status_id\",kind_id=\"$kind_id\",updated_at=NOW() where id=$id";
		$sql = "update loteria set jugada=\"$jugada\",monto=\"$monto\" where id=$id";

		$query_update = mysqli_query($con,$sql);
			if ($query_update){
				$messages[] = "La jugada ha sido actualizada satisfactoriamente.";
			} else{
				$errors []= "Lo siento algo ha salido mal intenta nuevamente.".mysqli_error($con);
			}
		} else {
			$errors []= "Error desconocido.";
		}
		
		if (isset($errors)){
			
			?>
			<div class="alert alert-danger" role="alert">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong>Error!</strong> 
					<?php
						foreach ($errors as $error) {
								echo $error;
							}
						?>
			</div>
			<?php
			}
			if (isset($messages)){
				
				?>
				<div class="alert alert-success" role="alert">
						<button type="button" class="close" data-dismiss="alert">&times;</button>
						<strong>¡Bien hecho!</strong>
						<?php
							foreach ($messages as $message) {
									echo $message;
								}
							?>
				</div>
				<?php
			}

?>