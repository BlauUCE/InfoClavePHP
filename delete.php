<?php 
if (isset($_GET['id'])) {
	include('database.php');
	$base = new Database();
	$id=intval($_GET['id']);
	$res = $base->delete($id);
	if($res) {
		echo '<script type="text/javascript"> window.location="index.php"; </script>';
	} else {
		echo "Error al eliminar la información";
	}
}
?>