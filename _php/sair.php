<?php
session_start();
//Destroi a seção
unset($_SESSION['login_session']);
unset($_SESSION['senha_session']);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
	<title>exemplo branco</title>
	<meta charset="utf-8">
	<!--<link rel="stylesheet" type="text/css" href="../_css/styleSair.css">-->
</head>

<body>

	<center>
		<div class="box">

			<p>Obrigado!</p>

			<a href='../index.html'>Voltar</a>

		</div>
	</center>

</body>

</html>