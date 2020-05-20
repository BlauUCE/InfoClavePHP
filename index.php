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
                    <div class="col-sm-8"></div>
                    <div class="col-sm-4">
                        <a href="create.php" class="btn btn-info add-new"><i class="fa fa-plus"></i>Agregar</a>
                    </div>
                </div>
            </div>
            <?php
                $contador = 1;
            ?>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th class="text.center"><b>DATOS</b></th>
                    </tr>
                </thead>
				<?php 
                    include ('database.php');
                    $base = new Database();
                    $listado=$base->read();
				?>
                <tbody>
                    <?php 
                        while ($row=mysqli_fetch_object($listado)) {
                            $id=$row->id;
                            $info=$row->info;
                    ?>
                            <tr>
                                <td>
                                <div class="pull-right" style="border-left: 1px solid blue">
                                    <a href="update.php?id=<?php echo $id;?>" class="edit" title="Editar" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
                                    <a href="delete.php?id=<?php echo $id;?>" class="delete" title="Eliminar" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a><br>
                                </div>
                                <div class="pull-left" style="border-right: 1px solid blue">
                                    <?php
                                        echo $contador;
                                    ?>
                                </div>
                                <br>
                                <div class="info">
                                    <?php
                                    $text = str_replace("\r\n",'<br>',$info);
                                     echo $text;
                                    ?>
                                </div>
                                </td>
                            </tr>	
                    <?php
                            $contador=$contador+1;
                        }
                    ?>                          
                </tbody>
            </table>
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-8"></div>
                    <div class="col-sm-4">
                        <a href="create.php" class="btn btn-info add-new"><i class="fa fa-plus"></i>Agregar</a>
                    </div>
                </div>
            </div>
        </div>
    </div> 
</body>
</html>                            