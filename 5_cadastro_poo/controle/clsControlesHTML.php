<?php
require_once('../modelo/clsCategoria.php'); // Ensure the correct path to clsPerfil.php

class clsControlesHTML
{
	#construtor
	function __construct() {}

	public function geraSelect($nome, $tabela, $codigoSelecionado = '')
	{
		if (!$tabela || !($tabela instanceof mysqli_result)) {
			return '<select name="' . $nome . '"><option value="">Nenhuma categoria encontrada</option></select>';
		}

		$options = '<select name="' . $nome . '">';
		while ($linha = mysqli_fetch_row($tabela)) {
			$selected = ($codigoSelecionado == $linha[0]) ? 'selected="selected"' : '';
			$options .= '<option value="' . $linha[0] . '" ' . $selected . '>' . $linha[1] . '</option>';
		}
		return $options . '</select>';
	}


	public function geraGrid($tabela)
	{
		$htmlTabela = '<table class="w3-table-all">
						<thead>
							<tr class="w3-red">
								<th>FOTO</th>
								<th>NOME</th>
								<th>PRE&Ccedil;O</th>
								<th>CATEGORIA</th>
								<th><center>ALTERAR</center></th>
								<th><center>EXCLUIR</center></th>														
							</tr>
						</thead>';

		$categoria = new clsCategoria();

		while ($linha = mysqli_fetch_row($tabela)) {

			$select = $this->geraSelect('slcCategoria_' . $linha[0], $categoria->pegaCategorias($linha[0]), $linha[3]);

			$htmlTabela .= '<tr>
								<td><img style="height:150px" src="imagens/' . $linha[1] . '.jpg"></img><br><input type="file" size="30" name="txtArquivo_' . $linha[0] . '"/></td>
								<td><input type="text" size="20" readonly="true" name="txtNome_' . $linha[0] . '" value="' . $linha[1] . '"/></td>
								<td><input type="text" size="10" class="preco_produto" name="txtPreco_' . $linha[0] . '" value="' . $linha[2] . '"/></td>
								<td>' . $select . '</td>												
								<td><center><button type="submit" name="btnAlterar" value="' . $linha[0] . '">Alterar</button>
								<td><center><button type="submit" name="btnExcluir" value="' . $linha[0] . '">Excluir</button>
							 </tr>';
		}

		$htmlTabela .= '</table>';

		return $htmlTabela;
	}
}
