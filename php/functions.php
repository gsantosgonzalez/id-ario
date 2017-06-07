<?php

include 'conexion.php';
// Límite de infografías en el sitio
$limit1 = isset($_GET['limit1']) ? $_GET['limit1'] : 3;

function getImages(){
	global $limit1;
	$link = getConnection();

	$consulta = "SELECT nombre_infografia, nombre_archivo FROM images ORDER BY id_infografia DESC LIMIT $limit1";
	echo $consulta;
	if ( $result = $link->query($consulta) ) {
		$total = $result->num_rows;
		$count = 0;
		while ($images = $result->fetch_array(MYSQLI_BOTH) ) {
			echo "<div class = 'more_infogpc element".$count."' style = '".($count == 0 ? 'display:block;' : 'display:none;')."'>";
			echo "<img src = 'uploaded_imgs/".$images['nombre_archivo']."'>";
			echo "</div>";
			$count++;
		}
	}
	$link->close();
}