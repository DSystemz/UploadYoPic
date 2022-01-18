<?php 
	include("db_connect.php");
	$msg = false;

	if(isset($_FILES['arquivo']))
		
	{
		$extensao = strtolower(substr($_FILES['arquivo']['name'], -4));
		$novo_nome = md5(time()) . $extensao;
		$dir = "imagens/";

		move_uploaded_file($_FILES['arquivo']['tmp_name'], $dir.$novo_nome);

		$sql_code = "INSERT INTO arquivo (codigo, arquivo, data) VALUES(null, '$novo_nome', NOW())";
		$mysqli->query($sql_code);
	}

 ?>

<h1>Upload de Arquivos</h1>
<?php if($msg != false) echo "<p> $msg </p>"; ?>
<form action="upload.php" method="post" enctype="multipart/form-data">
	Arquivo: <input type="file" required name="arquivo">
	<input type="submit" value="Salvar">

</form>