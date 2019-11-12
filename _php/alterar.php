<!doctype html>
<html lang="pt-br">

<head>
	<meta charset="utf-8" />
	<title>Alterar Dados</title>
<!--<link rel="stylesheet" href="../_css/styleAlterar.css">-->
</head>

<body>
	<?php
	include "conect.php";

	if (!isset($_SESSION)) {
		session_start();
	}
	//não permite acesar a pagina principal pelo navegador
	//senão existir a seção volta pela pagina de erro
	if (!isset($_SESSION['login_session']) and !isset($_SESSION['senha_session'])) {
		header("location:../_html/erro.html");
		exit;
	}

	$dados = mysqli_query($sql, "SELECT * FROM aluno where login = '$_SESSION[login_session]' ");
	while ($coluna = mysqli_fetch_array($dados)) {
		$rm = $coluna['rm'];
		$nome = $coluna['nome'];
		$login = $coluna['login'];
		$senha = $coluna['senha'];
		$email = $coluna['email'];
	}

	?>
	<div class='box'>
		<form enctype="multipart/form-data" action='salvaralteracao.php?rm=$rm' name='form' method='post'>
			<center>

				<h1>Alterar</h1>

				<input name="rm" type="hidden" value=<?php echo "$rm"; ?>>

				<p class='texto'>Nome:</p><input name="nome" type="text" value=<?php echo "$nome"; ?>>

				<p class='texto'>Login:</p><input name="login" type="text" value=<?php echo "$login"; ?>>

				<p class='texto'>Senha:</p><input name="senha" type="password" value=<?php echo "$senha"; ?>>

				<p class='texto'>Email:</p><input name="email" type="text" value=<?php echo "$email"; ?>>

				<input type='submit' name='enviar' value='Alterar'>

			
		</form>
		<p><a href="listart.php">listar</a></p>
		</center>
	</div>

</body>

</html>