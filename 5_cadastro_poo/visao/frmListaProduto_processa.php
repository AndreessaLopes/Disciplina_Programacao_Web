<?php
require_once('../modelo/clsProduto.php');

$produto = new clsProduto();

if (isset($_POST['btnExcluir'])) {
	$produto->setNome($_POST['txtNome_' . $_POST['btnExcluir']]);
	if ($produto->exclui() == true)
		header('location:frmListaProduto.php');
	else {
		echo 'Problema ao apagar o registro no banco de dados. <br>
			 <a href="frmListaProduto.php"> VOLTAR </a>';
	}
} else #alterar
{
	$produto->setId($_POST['btnAlterar']);
	$produto->setNome($_POST['txtNome_' . $_POST['btnAlterar']]);
	$produto->setPreco($_POST['txtPreco_' . $_POST['btnAlterar']]);
	$produto->setCategoria($_POST['slcCategoria_' . $_POST['btnAlterar']]);
	$produto->setFoto($_FILES['txtArquivo_' . $_POST['btnAlterar']]);
	

	if ($produto->salvar(false) == true)
		header('location:frmListaProduto.php');
	else {
		echo 'Problema ao apagar o registro no banco de dados. <br>
			 <a href="frmListaProduto.php"> VOLTAR </a>';
	}
}
