<?php
require_once('../controle/clsConexao.php');
require_once('clsComum.php');

class clsCategoria extends clsComum
{
	function __construct() {}

	public function pegaCategorias()
	{
		$conexao = new clsConexao();
		$categorias = $conexao->executaSQL('SELECT * from tb_categoria;');
		return $categorias;
	}

	public function pegaCategoriaPorId($id)
	{
		$conexao = new clsConexao();
		$sql = "SELECT nome_categoria FROM tb_categoria WHERE id_categoria=" . $id . ";";
		
		$tabela = $conexao->executaSQL($sql);
		$nome_categoria = '';
		
		while ($linha = mysqli_fetch_row($tabela))
		{
			$nome_categoria = $linha[0];
		}
		
		return $nome_categoria;
	}
}
