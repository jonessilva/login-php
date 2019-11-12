<!doctype html>
<html lang="pt-br">

<head>
	<meta charset="utf-8" />
	<title>Alterar Imagem</title>
	<!--<link rel="stylesheet" href="../_css/styleAlterarImg.css">-->
</head>

<body>

	<?php

	if (!isset($_SESSION)) {
		session_start();
	}
	//não permite acesar a pagina principal pelo navegador
	//senão existir a seção volta pela pagina de erro
	if (!isset($_SESSION['login_session']) and !isset($_SESSION['senha_session'])) {
		header("location:../_html/erro.html");
		exit;
	}

	include "apagaIMG.php";



	$dados = mysqli_query($sql, "SELECT * FROM aluno where login = '$_SESSION[login_session]' ");
	while ($coluna = mysqli_fetch_array($dados)) {
		$rm = $coluna['rm'];
		$foto = $coluna['foto'];
	}

	?>
	<div class='box'>
		<form enctype="multipart/form-data" action='salvarNovaImagem.php?rm=$rm' name='form' method='post'>

			<h1>Alterar</h1>
			<input name="rm" type="hidden" value=<?php echo "$rm"; ?>>

			<p class='texto'>Foto:</p><input name="userfile" type="file"></br>

			<input type="submit" name="enviar" value="Alterar">

		</form>
	</div>