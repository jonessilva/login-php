<?php
include"conect.php";

session_start();
//Destroi a seção
  unset($_SESSION['login_session']);
  unset($_SESSION['senha_session']);

header("Location: ../index.html");

$rm = $_POST["rm"];
$dados = mysqli_query($sql,"SELECT * FROM aluno where rm = $rm ");

$uploaddir = 'imagens/';
$arquivo = $_FILES["userfile"]["name"];
$separa = explode(".",$arquivo);
$separa = array_reverse($separa);
$tipo = $separa[0];
$imagem = $rm.'.' .$tipo;
if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploaddir . $imagem)) {
    $uploadfile = $uploaddir . $imagem;
} else {
    echo"não foi possível concluir o upload da imagem.";
}

$sql->query("UPDATE aluno SET foto='$uploadfile' where rm = $rm");

session_start();
//Destroi a seção
  unset($_SESSION['login_session']);
  unset($_SESSION['senha_session']);

header("Location: ../index.html");
