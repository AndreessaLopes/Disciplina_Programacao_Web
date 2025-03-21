<?php
// Executando a conexão
require_once('conexao.php');

// Verifica a existência do usuário
session_start();
if (!isset($_SESSION['login'])) {
    header('location:index.php');
    exit(); // Importante adicionar exit() após redirecionamento
}

$login = $_SESSION['login'];

// Captura os dados que o usuário inseriu na página de cadastro de produto
$nome_produto = mysqli_real_escape_string($conexao, $_POST['nome_produto']);
$preco_produto = str_replace(',', '.', str_replace('.', '', $_POST['preco_produto'])); // Converte o preço para o formato numérico
$id_categoria = intval($_POST['id_categoria']); // Garante que a categoria seja um inteiro
$foto_produto = $_FILES['foto_produto'];

// Verificar a existência prévia deste produto no banco de dados
$sql = "SELECT * FROM tb_produto WHERE nome_produto = '$nome_produto' AND id_categoria = '$id_categoria';";

// Comando PHP que executa uma string SQL no banco de dados
$tabela = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));

// Averigua dentro da matriz quantas linhas existem
$num_linhas = mysqli_num_rows($tabela);

// Se for zero, então o produto não existe no banco de dados e pode ser inserido
if ($num_linhas == 0) {
    // Inserção no banco de dados
    $sql = "INSERT INTO tb_produto(nome_produto, preco_produto, id_categoria) 
            VALUES ('$nome_produto', '$preco_produto', '$id_categoria');";

    $resultado = mysqli_query($conexao, $sql);

    // Move o arquivo para a pasta correta
    if ($resultado == true && $foto_produto["error"] == 0) {
        $id_produto = mysqli_insert_id($conexao); // Obtém o ID do produto inserido
        move_uploaded_file($foto_produto["tmp_name"], 'imagens/' . $nome_produto . '.jpg');
    }

    // Avaliando o resultado
    if ($resultado == true) {
        header('location:lista_produto.php');
        exit(); // Adiciona exit() após redirecionamento
    } else {
        echo 'Problema ao inserir o registro no banco de dados <br>';
        echo 'O erro que aconteceu foi este: ' . mysqli_error($conexao);
        echo '<a href="menu.php"> VOLTAR </a>';
    }
} else {
    // Código que é executado quando o produto já existe no banco de dados
    echo 'Esse produto já existe!';
    echo '<a href="novo_produto.php"> VOLTAR </a>';
}
