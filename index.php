<?php
	if(isset(($_POST['acao']))){
		//Formulário foi enviado
	$arquivo = $_FILES['file'];
	$arquivoNovo =  explode('.',$arquivo['name']);

	if($arquivo[sizeof($arquivoNovo)-1] != '.jpg'){
		die('Você não pode fazer upload deste tipo de arquivo');
	}else{
		echo 'Upload feito com sucesso';
		move_uploaded_file($arquivo['tmp_name'],'uploads/'.$arquivo['name']);
	}

	}

 ?>
<h1>Upload de Arquivos</h1>
<form action="upload.php" method="post" enctype="multipart/form-data">
	Arquivo: <input type="file" required name="arquivo">
	<input type="submit" value="Salvar">

</form>