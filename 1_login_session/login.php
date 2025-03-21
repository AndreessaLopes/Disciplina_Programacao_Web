<?php
$login = $_POST['txtLogin'];
$senha = $_POST['txtSenha'];

if ($login == 'Andressa' && $senha == '123') {
	session_start();
	$_SESSION['login'] = $login;
	header('location:sobre.php');
} else {
	session_start();
	$_SESSION['erro'] = 'Login ou senha incorretos';
	header('location:index.php');
}
?>