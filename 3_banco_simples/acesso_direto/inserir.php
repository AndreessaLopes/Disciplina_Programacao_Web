<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// executando a conexao
$conexao = mysqli_connect('localhost', 'root', '', 'bd_teste');

// verificando a conexão
if (!$conexao) {
    die('Erro de conexão: ' . mysqli_connect_error());
}

// executando a consulta
$sql = 'INSERT INTO tb_pessoa (nome, idade) 
        VALUES ("Rodrigo Oliveira", 23);';

// executando a consulta e verificando erros
$resultado = mysqli_query($conexao, $sql);

if ($resultado) {
    echo 'Registro inserido com sucesso';
} else {
    echo 'Problema ao inserir o registro no banco de dados: ' . mysqli_error($conexao);
}

// fechando a conexão
mysqli_close($conexao);
?>
