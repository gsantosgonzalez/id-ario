<?php

error_reporting(E_ALL);

include('conexion.php');

$name = isset( $_POST["nombre"] ) ? $_POST["nombre"] : "image.".getdate();
$filename = utf8_decode(strip_tags($_FILES["file"]['name']));
$type = $_FILES["file"]['type'];

$date = date("Y-m-d");
$accepted_types = array("image/jpeg", "image/jpg", "image/png");
$images_folder = "../uploaded_imgs/";

if ( !in_array($type, $accepted_types) ) {
	echo "Solamente puedes subir archivos con formato \"png\" o \"jpg\"";
}

$nombre = replace_latin_chars( $filename );
$nombre = strtolower( $nombre );

if( $type === "image/jpeg"){
	$nombre = changeFileExtension($nombre);
}

if ((is_dir($images_folder)) ){
	$destino = $images_folder.$nombre;
} else {
	mkdir($images_folder, 0755);
	$destino = $images_folder.$nombre;
}
if (copy($_FILES['file']['tmp_name'], $destino)){
	$link = getConnection();

	$sql = "INSERT INTO images ( nombre_infografia, nombre_archivo ) values ( '$name', '$nombre' )";
	if ($link->query($sql) === TRUE) {
		echo "El archivo fue insertado correctamente";
	} else {
		echo "No pudimos insertar el archivo";
	}
	$link->close();	
}

function replace_latin_chars( $str, $space = '_' ) {
	if( empty( $str ) || ! is_string( $str ) || ! is_string( $space ) ) {
		echo "Invalid or unsupported type. Only strings are supported.";
		return;
	}

	$chars = array( '/á|ä|Á|Ä/', '/é|ë|É|Ë/', '/í|ï|Í|Ï/', '/ó|ö|Ó|Ö/', '/ú|ü|Ú|Ü/', '/ñ|Ñ/', '/\s/' );
	$replace = array( 'a', 'e', 'i', 'o', 'u', 'n', $space );

	return preg_replace( $chars, $replace, $str );
}

function changeFileExtension($file){
	$tmp_name = explode('.', $file);
	$nombre = "";
	foreach ($tmp_name as $fragment) {
		if( $fragment === end($tmp_name)){
			$nombre .= "jpg";
		} else {
			$nombre .= $fragment.".";
		}		
	}
	return $nombre;
}