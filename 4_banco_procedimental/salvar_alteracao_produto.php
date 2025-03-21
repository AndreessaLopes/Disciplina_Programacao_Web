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
	$categoria = $_POST['slcCategoria'];
    $id_produto = $_POST['idProduto']; 

	
	//executando a conexao
    require('conexao.php');
	
	//executando insercao de usuario no banco
    $sql = "UPDATE tb_produto 
    SET nome_produto = '".$nome."', 
        preco_produto = '".$preco."', 
        id_categoria = '".$categoria."' 
    WHERE id_produto = '".$id_produto."'"; // Cláusula WHERE para especificar o produto
								  
	$resultado = mysqli_query($conexao, $sql);

	//avaliando o resultado
	if ($resultado == true)
	{
		header('location:lista_produto.php');
	}
	else
	{
		echo 'Problema ao alterar o registro no banco de dados <br>';
		echo 'O erro que aconteceu foi este: ' . mysqli_error($conexao);
		echo '<a href="menu.php"> VOLTAR </a>';
	}
?>