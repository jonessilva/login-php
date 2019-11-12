<?php

if(!isset($_SESSION)) 
{ 
session_start(); 
}  
//n�o permite acesar a pagina principal pelo navegador
//sen�o existir a se��o volta pela pagina de erro
if(!isset($_SESSION['login_session'])AND !isset($_SESSION['senha_session'])){
  header("location:../_html/erro.html");
  exit;
}

// Aqui voc� se conecta ao banco
include"conect.php";
$rm = $_GET["rm"];
$dados = mysqli_query($sql,"SELECT * FROM aluno where rm = $rm ");
// Executa uma consulta que deleta um aluno
$sqld = "DELETE FROM aluno WHERE rm=$rm";
$query = $sql->query($sqld);
// aqui � para apagar a imagem na pasta
  while($coluna = mysqli_fetch_array($dados)) {
	$foto= $coluna['foto'];
  }
unlink("$foto");
header("Location: listart.php");
