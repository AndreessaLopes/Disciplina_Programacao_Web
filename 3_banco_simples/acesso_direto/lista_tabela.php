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

// exibindo os dados
if (mysqli_num_rows($tabela) > 0) {
    echo '<table border="1px">';
    echo '<tr><th>ID</th><th>Nome</th><th>Idade</th><th>Ação</th></tr>';

    while ($linha = mysqli_fetch_row($tabela)) {
        echo '<tr>';
        echo '<td>' . htmlspecialchars($linha[0]) . '</td>';
        echo '<td>' . htmlspecialchars($linha[1]) . '</td>';
        echo '<td>' . htmlspecialchars($linha[2]) . '</td>';
        echo '<td><a href="apaga.php?codigo=' . urlencode($linha[0]) . '">APAGAR</a></td>';
        echo '</tr>';
    }

    echo '</table>';
} else {
    echo 'Nenhum registro encontrado.';
}

// fechando a conexão
mysqli_close($conexao);
?>
