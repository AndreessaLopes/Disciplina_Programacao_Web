<?php
	//verifica a existencia do usuario
	session_start();
	if (!isset($_SESSION['login']))
	{
		header('location:index.php');
	}
	
	//-------------------------------------------------------------------
	//captura os dados que o usuario inseriu na pagina de login
	$login = $_SESSION['login'];
	$nome = $_POST['txtNome'];
    $preco = $_POST['txtPreco'];
	$categoria = $_POST['id_categoria'];
	
	//executando a conexao
    require('conexao.php');
	
	$sql = "SELECT * FROM tb_usuario WHERE login_usuario='" . $login . "';";
	
	//comando php que executa uma string SQL no banco de dados
	//sem isso, sem chance de funcionar.
	$tabela = mysqli_query($conexao, $sql) 
          or die(mysqli_error($conexao));
		  
	//averigua dentro da matrix quantas linhas existem
	$num_linhas = mysqli_num_rows($tabela);
	
	//se for zero, entao quer dizer que nao existe no banco de dados
	//nenhum usuario com esse login, logo, pode-se fazer o cadastro
	if ($num_linhas==1)
	{
		//executando insercao de usuario no banco
		$sql = "INSERT INTO tb_produto(nome_produto, preco_produto, id_categoria) 
        VALUES ('".$nome."', '".$preco."', '".$categoria."')";

		
		$resultado = mysqli_query($conexao, $sql);
	

		//avaliando o resultado
		if ($resultado == true)
		{
			header('location:lista_produto.php');
		}
		else
		{
			echo 'Problema ao inserir o registro no banco de dados <br>';
			echo 'O erro que aconteceu foi este: ' . mysqli_error($conexao);
			echo '<a href="menu.php"> VOLTAR </a>';
		}
	}
	else
	{
		//codigo que e executado quando o usuario ja existe no banco de dados
		echo 'Esse produto ja existe!';
		echo '<a href="novo_produto.php"> VOLTAR </a>';
	}
?>