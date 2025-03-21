<?php
require_once('../modelo/clsCategoria.php');
require_once('../controle/clsControlesHTML.php');
?>

<html>

<head>
	<title>SISTEMA POO</title>
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
	</style>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
	<script>
		$(document).ready(function() {
			$('#preco_produto').mask('000.000.000.000.000,00', {
				reverse: true
			});
		});
	</script>
</head>

<body>
	<table>
		<tr style="height:50px">
			<td colspan="2">
				<h1>MENU DO SISTEMA</h1>
			</td>
		</tr>
		<tr style="height:50px">
			<td colspan="2">
				Seja bem vindo(a)
			</td>
		</tr>
		<tr style="height:400px">
			<td colspan="2">
				<!-- TABELA QUE MOSTRA O MENU DO USUARIO -->
				<table style="height:400px;">
					<tr>
						<td style="width:150px; vertical-align:top;">
							<b>>> USU&Aacute;RIO</b></br>
							<a href="frmNovoProduto.php">Novo Produto</a><br>
							<a href="frmListaProduto.php">Gerenciar Produtos</a><br>
						</td>
						<td style="vertical-align:top; text-align:left;">
							<form method="post" action="frmNovoProduto_processa.php" enctype="multipart/form-data">
								<table>
									<tr>
										<td colspan="2">
											<b>:: Novo Produto ::</b>
										</td>
									</tr>
									<tr>
										<td>
											Nome:
										</td>
										<td>
											<input type="text" size="70" name="txtNome" required />
										</td>
									</tr>
									<tr>
										<td>
											Pre&ccedil;o:
										</td>
										<td>
											<input type="text" name="txtPreco" id="preco_produto" required placeholder="0,00">
										</td>
									</tr>
									<tr>
										<td>
											Categoria:
										</td>
										<td>
											<?php
											$categoria = new clsCategoria();
											$controles = new clsControlesHTML();
											echo $controles->geraSelect('slcCategoria', $categoria->pegaCategorias());
											?>
										</td>
									</tr>
									<tr>
										<td>
											Foto:
										</td>
										<td>
											<input type="file" size="30" name="txtArquivo" />
										</td>
									</tr>
									<tr>
										<td colspan="2" align="right">
											<button type="reset" name="btnApagar">Apagar</button>
											<button type="submit" name="btnSalvar">Salvar</button>
										</td>
									</tr>
								</table>
							</form>
						</td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
</body>

</html>