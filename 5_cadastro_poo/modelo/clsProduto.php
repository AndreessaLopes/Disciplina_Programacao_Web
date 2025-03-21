<?php
require_once('../controle/clsConexao.php');
require_once('../controle/clsArquivo.php');
require_once('clsComum.php');

class clsProduto extends clsComum
{
	#VARIAVEIS PRIVADAS
	private $preco;
	private $categoria;
	private $foto;

	#PROPRIEDADES

	#preco
	public function setPreco($valor)
	{
		$this->preco = $valor;
	}

	public function getPreco()
	{
		return $this->preco;
	}

	#categoria
	public function setCategoria($valor)
	{
		$this->categoria = $valor;
	}

	public function getCategoria()
	{
		return $this->categoria;
	}

	#foto
	public function setFoto($valor)
	{
		$this->foto = $valor;
	}

	public function getFoto()
	{
		return $this->foto;
	}

	#METODOS
	public function existeProduto()
	{
		$conexao = new clsConexao();
		$sql = "SELECT * FROM tb_produto WHERE nome_produto='" . $this->nome . "';";

		$resultado = false;
		if (mysqli_num_rows($conexao->executaSQL($sql)) >= 1)
			$resultado = true;

		return $resultado;
	}

	public function salvar($novoProduto = true)
	{
		#salva a foto
		$gravadorDeFoto = new clsArquivo();
		$gravadorDeFoto->setNomeArquivo($this->nome . '.jpg');
		$gravadorDeFoto->setDiretorio('../visao/imagens');
		$gravadorDeFoto->setArquivo($this->foto);
		$gravadorDeFoto->upload();

		if ($novoProduto == true) #salva
		{
			$sql = "INSERT INTO tb_produto(nome_produto, preco_produto, id_categoria) 
				    VALUES ('" . $this->nome . "','" . $this->preco . "',
					'" . $this->categoria . "');";
		} else #alterar
		{
			$sql = "UPDATE tb_produto SET 
			        nome_produto='" . $this->nome . "', 
					preco_produto='" . $this->preco . "', 
					id_categoria='" . $this->categoria . "' 
					WHERE id_produto=" . $this->id . ";";
		}

		$conexao = new clsConexao();
		return $conexao->executaSQL($sql);
	}

	public function pegaProdutos()
	{
		$conexao = new clsConexao();
		$sql = "SELECT * FROM tb_produto;";
		return $conexao->executaSQL($sql);
	}

	public function exclui()
	{
		#exclui foto
		$gravadorDeFoto = new clsArquivo();
		$gravadorDeFoto->setNomeArquivo($this->nome . '.jpg');
		$gravadorDeFoto->setDiretorio('imagens');
		$gravadorDeFoto->excluiArquivo();

		#exclui dados
		$conexao = new clsConexao();
		$sql = "DELETE FROM tb_produto WHERE nome_produto='" . $this->nome . "';";
		return $conexao->executaSQL($sql);
	}
}
