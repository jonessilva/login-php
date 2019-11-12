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
	$foto = $coluna['foto'];
}

?>

<html>

<head>
	<title>Pagina Principal</title>
	<!--<link rel="stylesheet" href="../_css/stylePagPrinc.css">-->
</head>

<body>
	<div class="box">

		<h1>Administrador</h1>

		Bem vindo a pagina principal <?php echo $_SESSION['login_session'] ?>

		</br></br>

		<?php echo "<img src='$foto'>" ?>

		</br></br>

		<a href="sair.php">Sair</a>

		</br></br>

		<a href="listart.php">Listar</a>

		</br></br>

		<a href="../_html/CadastroAdm.html">Cadastrar ADM</a>

		</br></br>

		<a href="alterar.php?rm=$rm">Alterar informações</a>

		</br></br>

		<a href="alterarImg.php?rm=$rm">Alterar foto</a>

	</div>
</body>

</html>