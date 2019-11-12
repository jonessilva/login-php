<?php
session_start();

include "conect.php";
  $login = $_POST['login'];
  $senha = $_POST['senha'];
  
  
  $dados = mysqli_query($sql, "SELECT * FROM aluno where login = '$login' ");

  while($coluna = mysqli_fetch_array($dados)) {
     $nivel_acesso = $coluna['nivel_acesso'];
	
	}
  //se o login do banco for igual ao login do formulario e senha igual a senha
  
  $logar = $sql->query("SELECT * FROM aluno WHERE login='$login' AND senha='$senha' ") or die("erro ao selecionar");
  
  //se existir um login e senha com os mesmo dados vai criar uma acesso
  //O if vai contar se existe um registro
$contagem = mysqli_num_rows($logar);
  if($contagem == 1){
    $_SESSION['login_session'] = $login;
    $_SESSION['senha_session'] = $senha;
	$_SESSION['nivel_acesso_session'] = $nivel_acesso;
    //vai liberar o acesso á pagina principal
    if($_SESSION['nivel_acesso_session'] == "1"){
		header("Location: pagina_principal.php");
    }
	
	elseif($_SESSION['nivel_acesso_session'] == "2"){
        header("Location: pagina_principal_adm.php");
    }
	
}
  
  else{
  //Destruir seção

  unset($_SESSION['login_session']);
  unset($_SESSION['senha_session']);

  include "../_html/erro.html";
     }
