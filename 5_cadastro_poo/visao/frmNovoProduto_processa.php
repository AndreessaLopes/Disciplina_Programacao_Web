<?php
require('../modelo/clsProduto.php');

$produto = new clsProduto();
$produto->setNome($_POST['txtNome']);
$produto->setPreco($_POST['txtPreco']);
$produto->setCategoria($_POST['slcCategoria']);
$produto->setFoto($_FILES['txtArquivo']);

if ($produto->existeProduto() == false)
	if ($produto->salvar() == true)
	{
		#header('location:lista_produto.php');
		echo 'Salvo!';
	}
	else
	{
		echo 'Problema ao inserir o registro no banco de dados <br>';
	}
else
{
	echo 'Esse produto j&aacute; existe!';
}

echo '<a href="frmNovoProduto.php"> VOLTAR </a>';


?>