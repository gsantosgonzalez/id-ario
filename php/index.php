<!DOCTYPE html>
<html>
<head>
	<meta charset = "utf-8">
	<meta http-equiv = "X-UA-Compatible" content = "IE=edge">
	<title>Test de subida de archivos</title>
	<link rel = "stylesheet" href = "estilos.css">
</head>
<body>
	<form action = "upload_file.php" method = "POST" enctype = "multipart/form-data">
		Nombre: <input type="text" name="nombre" placeholder="Nombre del archivo" required>
  		<input type = "file" name ="file" required/>
  		<input type="number" name = "limit1" required placeholder="1-10" min = "1" max = "10">
  		<input type = "submit" value = "Enviar"> 
	</form>
</body>
</html>