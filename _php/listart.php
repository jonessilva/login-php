<!doctype html>
<html lang="pt-br">

<head>
	<meta charset="utf-8" />
	<title> Listar dados</title>
	<!--<link rel="stylesheet" href="../_css/styleListar.css">-->
</head>

<body>
	<?php
	include "conect.php";
	$dados = mysqli_query($sql, "SELECT * FROM aluno");
	?>
	<table border="1">
		<tr>
			<td align="center">RM</td>
			<td align="center">Nome</td>
			<td align="center">Login</td>
			<td align="center">Senha</td>
			<td align="center">E-mail</td>
			<td align="center">Avatar</td>
			<td align="center">AÇÃO</td>
		</tr>

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

		while ($coluna = mysqli_fetch_array($dados)) {
			$rm = $coluna['rm'];
			$nome = $coluna['nome'];
			$login = $coluna['login'];
			$senha = $coluna['senha'];
			$email = $coluna['email'];
			$foto = $coluna['foto'];
			$nivel_acesso = $coluna['nivel_acesso'];
			echo "
	<tr>
	<td>$rm</td>
	<td>$nome</td>
	<td>$login</td>
	<td>$senha</td>
	<td>$email</td>
	<td><img src=$foto></td>
	<td><a href='delete.php?rm=$rm'>[Excluir]</a></td>
	</tr>";
		}


		?>
	</table>

	</br></br>

	<p><a href="pagina_principal.php">Voltar</a></p>

</body>

</html>