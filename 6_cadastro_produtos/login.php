<?php
session_start();

//captura os dados que o usuario inseriu na pagina de login
$login = $_POST['txtLogin'];
$senha = $_POST['txtSenha'];

//executando a consulta
$sql = "SELECT * FROM tb_usuario WHERE login_usuario='" . $login . "' AND senha_usuario='" . $senha . "';";

//busca no banco de dados o usuario que esta tentando fazer login
//executando a conexao
require_once('conexao.php');

$tabela = mysqli_query($conexao, $sql);

//exibindo os dados
//enquanto existirem linhas na matriz busque linha por linha e adicione a variavel $linha

if (mysqli_num_rows($tabela) == 1) {
	$_SESSION['login'] = $login;
	header('location:menu.php');
} else {
	echo 'Login ou senha incorretos!';
	echo '<br><br>';
	echo '<a href="index.php">Voltar para a principal</a>';
}
