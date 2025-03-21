<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// executando a conexão e selecionando o banco
$conexao = mysqli_connect('localhost', 'root', '', 'bd_teste');

// verificando a conexão
if (!$conexao) {
    die('Erro de conexão: ' . mysqli_connect_error());
}

// executando a consulta
$sql = 'SELECT * FROM tb_pessoa;';
$tabela = mysqli_query($conexao, $sql) or die('Erro na consulta: ' . mysqli_error($conexao));

// verificando se há registros
if (mysqli_num_rows($tabela) > 0) {
    // exibindo os dados
    while ($linha = mysqli_fetch_row($tabela)) {
        echo 'Id: ' . htmlspecialchars($linha[0]) . '<br>';
        echo 'Nome: ' . htmlspecialchars($linha[1]) . '<br>';
        echo 'Idade: ' . htmlspecialchars($linha[2]) . '<br>';
        echo '<br><br>';
    }
} else {
    echo 'Nenhum registro encontrado.';
}

// fechando a conexão
mysqli_close($conexao);
?>
