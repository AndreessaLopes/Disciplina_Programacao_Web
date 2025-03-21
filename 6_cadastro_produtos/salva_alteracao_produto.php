<?php
require_once('conexao.php');
session_start();

// Verifica a existência do usuário
if (!isset($_SESSION['login'])) {
    header('location:index.php');
    exit();
}

$login = $_SESSION['login']; // Captura o login para utilizar, se necessário

// Captura os dados do formulário
$id_produto = intval($_POST['hddCodigo']); // Verifique se o campo de produto está sendo enviado corretamente
$nome_produto = mysqli_real_escape_string($conexao, $_POST['txtNome']);
$preco_produto = str_replace(',', '.', str_replace('.', '', $_POST['preco_produto'])); // Converte o preço para o formato numérico
$id_categoria = intval($_POST['slcCategoria']);
$foto_produto = $_FILES['txtArquivo']; // Arquivo de imagem enviado

// Atualiza os dados do produto no banco de dados
$sql = "UPDATE tb_produto 
        SET nome_produto = '$nome_produto', 
            preco_produto = '$preco_produto', 
            id_categoria = '$id_categoria' 
        WHERE id_produto = $id_produto;";

$resultado = mysqli_query($conexao, $sql);

// Verifica se o produto foi atualizado
if ($resultado == true) {
    // Se a foto foi enviada, faz o upload da imagem
    if ($foto_produto["error"] == 0) {
        $target_dir = 'imagens/';
        $target_file = $target_dir . $nome_produto . '.jpg'; // Nome da foto usando o ID do produto
        move_uploaded_file($foto_produto["tmp_name"], $target_file);
    }

    // Se a atualização for bem-sucedida, redireciona para a lista de produtos
    header('location:lista_produto.php');
    exit();
} else {
    // Se ocorrer um erro ao atualizar, exibe a mensagem de erro
    echo 'Problema ao atualizar o registro no banco de dados <br>';
    echo 'O erro que aconteceu foi este: ' . mysqli_error($conexao);
    echo '<a href="menu.php"> VOLTAR </a>';
}
?>
