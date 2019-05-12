<?php	
	session_start();
	/*Inicia validacion del lado del servidor*/
	$loto = false;
	if(empty($_POST['check']) && 
	empty($_POST['check1']) && 
	empty($_POST['check2']) && 
	empty($_POST['check3']) && 
	empty($_POST['check4']) && 
	empty($_POST['check5']) && 
	empty($_POST['check6'])){
		$loto = true;
	}
	if (empty($_POST['jugada'])) {
           $errors[] = "Jugada vacía";
        } else if (empty($_POST['monto'])){
			$errors[] = "Monto vacío";
		} else if ($loto){
			$errors[] = "No ha seleccionado ninguna loteria";
		} else if (
			!empty($_POST['jugada']) &&
			!empty($_POST['monto']) && !$loto
		){


		include "../config/config.php";//Contiene funcion que conecta a la base de datos

		$jugada = $_POST["jugada"];
		$monto = $_POST["monto"];
		$newYorkDia = isset($_POST["check"]);
		$real = isset($_POST["check1"]);
		$ganaMas = isset($_POST["check2"]);
		$loteka = isset($_POST["check3"]);
		$newYorkNoche = isset($_POST["check4"]);
		$quinielaPale = isset($_POST["check5"]);
		$nacionalNoche = isset($_POST["check6"]);
		$nacionalNoche = isset($_POST["check6"]);
		$sql="insert into loteriasNombre (NYD,R,GM,L,NYN,QP,NN) value (\"$newYorkDia\",\"$real\",\"$ganaMas\",\"$loteka\",\"$newYorkNoche\",\"$quinielaPale\",\"$nacionalNoche\")";
		$query_new_insert = mysqli_query($con,$sql);

		// $user_id=$_SESSION['user_id'];

		//$sql="insert into ticket (title,description,category_id,project_id,priority_id,user_id,status_id,kind_id,created_at) value (\"$title\",\"$description\",\"$category_id\",\"$project_id\",$priority_id,$user_id,$status_id,$kind_id,$created_at)";
		$sql="insert into loteria (jugada,monto) value (\"$jugada\",\"$monto\")";
		$query_new_insert = mysqli_query($con,$sql);
			if ($query_new_insert){
				$messages[] = "La juagada ha sido ingresada satisfactoriamente.";
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