<?php
require_once('../modelo/clsProduto.php');
require_once('../controle/clsControlesHTML.php');
?>

<html>

<head>
	<title>Menu do Sistema</title>
	<style>
		table {
			width: 100%;
		}

		table,
		th,
		td {
			border: 1px solid black;
			border-collapse: collapse;
		}

		th,
		td {
			padding: 5px;
			text-align: left;
		}

		table#t01 tr:nth-child(even) {
			background-color: #eee;
		}

		table#t01 tr:nth-child(odd) {
			background-color: #fff;
		}

		table#t01 th {
			background-color: black;
			color: white;
		}

		input.login {
			background-color: #dfdada;
		}
	</style>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>

<body>
	<table>
		<tr style="height:50px">
			<td colspan="2">
				<h1>SISTEMA POO</h1>
			</td>
		</tr>
		<tr style="height:50px">
			<td colspan="2">
				Seja bem vindo(a)!
			</td>
		</tr>
		<tr style="height:400px">
			<td colspan="2">
				<!-- TABELA QUE MOSTRA O MENU DO PRODUTO -->
				<table style="height:400px;">
					<tr>
						<td style="width:150px; vertical-align:top;">
							<b>>> USU&Aacute;RIO</b></br>
							<a href="frmNovoProduto.php">Novo Produto</a><br>
							<a href="frmListaProduto.php">Gerenciar Produtos</a><br>
						</td>
						<td style="vertical-align:top; text-align:left;">
							<!-- TABELA QUE LISTA OS ProdutoS CADASTRADOS NO BANCO DE DADOS -->
							<div class="w3-container">
								<h2>LISTA DE PRODUTOS</h2>
								<form method="post" action="frmListaProduto_processa.php" enctype="multipart/form-data">
									<?php
									$produto = new clsProduto();
									$tabela = $produto->pegaProdutos();

									$controles = new clsControlesHTML();
									echo $controles->geraGrid($tabela);
									?>
								</form>
							</div>
						</td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
</body>

</html>