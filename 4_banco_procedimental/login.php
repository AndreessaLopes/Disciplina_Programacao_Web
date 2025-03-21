<?php
session_start();

//captura os dados que o usuario inseriu na pagina de login
$login = $_POST['txtLogin'];
$senha = $_POST['txtSenha'];

//executando a consulta
$sql = "SELECT * FROM tb_usuario WHERE login_usuario='" . $login . " 'AND senha_usuario= '". $senha."';";

//busca no banco de dados o usuario que esta tentando fazer login
//executando a conexao
require('conexao.php');

$tabela = mysqli_query($conexao, $sql) ;

//checa se o usuario valido existe no banco
//se retorna 0, entao nao existe um usuario valido
if (mysqli_num_rows($tabela) == 1)
{
	$_SESSION['login'] = $login;
	header('location:menu.php');
}
else{
	echo'Login ou Senha incorretos';
	echo'<br><br>';
	echo '<a href="index.php">Voltar para principal</a>';
}
?>