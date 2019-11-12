<?php

if(!isset($_SESSION)) 
{ 
session_start(); 
}  
//não permite acesar a pagina principal pelo navegador
//senão existir a seção volta pela pagina de erro
if(!isset($_SESSION['login_session'])AND !isset($_SESSION['senha_session'])){
  header("location:../_html/erro.html");
  exit;
}

include"conect.php";

$dados = mysqli_query($sql,"SELECT * FROM aluno where login = '$_SESSION[login_session]' ");

while($coluna = mysqli_fetch_array($dados)) {
	$foto = $coluna['foto'];
}

unlink("$foto");
