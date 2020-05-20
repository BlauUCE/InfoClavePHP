<?php
	if (isset($_GET['id'])) {
		$id=intval($_GET['id']);
	} else {
		echo '<script type="text/javascript"> window.location="index.php"; </script>';
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>INFORMACION</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="css/custom.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-8"><h2><b>Información</b></h2></div>
                    <div class="col-sm-4">
                        <a href="index.php" class="btn btn-info add-new"><i class="fa fa-arrow-left"></i> Regresar</a>
                    </div>
                </div>
            </div>
            <?php
				include ("database.php");
				$base = new Database();
				if(isset($_POST) && !empty($_POST)) {
					$info = $base->sanitize($_POST['info']);
					$id_info=intval($_POST['id_info']);
					$res = $base->update($info, $id_info);
					if($res){
						$message= "Datos actualizados con éxito";
						$class="alert alert-success";
						
					} else {
						$message="No se pudieron actualizar los datos";
						$class="alert alert-danger";
					}
			?>
					<div class="<?php echo $class?>">
						<?php echo $message;?>
					</div>	
					<?php
				}
				$datos_cliente=$base->single_record($id);
					?>
			<div class="row">
				<form method="post">
					<div class="col-md-6">
						<label>Información:</label>
						<input type="text" name="info" id="info" class='form-control' maxlength="255" required  value="<?php echo $datos_cliente->info;?>">
						<input type="hidden" name="id_info" id="id_info" class='form-control' maxlength="100"   value="<?php echo $datos_cliente->id;?>">
					</div>
					<div class="col-md-12 ">
						<hr>
						<button type="submit" class="btn btn-success pull-right">Actualizar</button>
					</div>
				</form>
			</div>
        </div>
    </div>     
</body>
</html>                            