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




$dados = mysqli_query($sql, "SELECT * FROM aluno WHERE login = '$_SESSION[login_session]' ");
while ($coluna2 = mysqli_fetch_array($dados)) {
	$rm = $coluna2['rm'];
	$nome = $coluna2['nome'];
	$login = $coluna2['login'];
	$senha = $coluna2['senha'];
	$email = $coluna2['email'];
	$foto = $coluna2['foto'];
}

?>

<html>

<head>
	<title>Pagina Principal</title>
	<!--<link rel="stylesheet" href="../_css/stylePagPrinc.css">-->
</head>

<body>
	<div class="box">

		Bem vindo a pagina principal <?php echo $_SESSION['login_session'] ?>

		</br></br>

		<?php echo "<img src='$foto'>" ?>

		</br></br>

		<a href="sair.php">Sair</a>

		</br></br>

		<a href="alterarIMG.php?rm=$rm">Alterar foto</a>

		</br>

		<a href="alterar.php?rm=$rm">Alterar informações</a><br>
		<a href="listart.php">listar usuarios</a>

	</div>
</body>

</html>