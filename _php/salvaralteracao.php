<?php 
include"conect.php";
$rm = $_POST['rm'];
$nome = $_POST['nome'];
$login = $_POST['login'];
$senha = $_POST['senha'];
$email = $_POST['email'];

$sql->query("UPDATE aluno SET nome='$nome',login='$login',senha='$senha', email='$email' where rm = $rm");

session_start();
//Destroi a seção
  unset($_SESSION['login_session']);
  unset($_SESSION['senha_session']);

header("Location: ../index.html");
