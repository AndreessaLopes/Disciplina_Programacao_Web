<?php
//faz a conexao com o banco de dados
require_once('conexao.php');
session_start();
//averigua se o usuario fez login corretamente no sistema
//caso nao tenha feito esse bloco de codigo a seguir impede o usuario
//de acessar a pagina e redireciona o mesmo para a pagina inicial.
//Caso o usuario tenha feito login corretamente, entao os dados deste
//usuario serao capturados.
if (!isset($_SESSION['login'])) {
    header('location:index.php');
    exit();
} else {
    //constroi a string sql com base no login ja verificado na pagina de login
    $sql = "SELECT * FROM tb_usuario WHERE login_usuario='" . $_SESSION['login'] . "';";

    //vai no banco de dados e executa a consulta sql para buscar os dados do usuario
    //que acabou de fazer login
    $tabela = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));

    //prepara um vetor para receber os dados do usuario que esta no banco
    $dados_usuario = '';

    while ($linha = mysqli_fetch_row($tabela)) {
        //busca o vetor com as informacoes do usuario e coloca no vetor dados_usuario
        $dados_usuario = $linha;
    }
}
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
    </style>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>

<body>
    <table>
        <tr style="height:50px">
            <td colspan="2">
                <h1>MENU DO MERCADIN DO SEU ZÉ</h1>
            </td>
        </tr>
        <tr style="height:50px">
            <td>
                <img style="height:100px" src="imagens/<?php echo $dados_usuario[2] . '.jpg'; ?>"></img> <br>
                Seja bem vindo(a) <?php echo $dados_usuario[1]; ?>!
            </td>
            <td>
                <a href="logout.php"><img src="imagens/logout.jpg"></img></a>
            </td>
        </tr>
        <tr style="height:400px">
            <td colspan="2">
                <!-- TABELA QUE MOSTRA O MENU DO USUARIO -->
                <table style="height:400px;">
                    <tr>
                        <td style="width:150px; vertical-align:top;">
                            <?php
                            if ($dados_usuario[4] == 1) {
                                echo '
                                            <b>>> USU&Aacute;RIO</b></br>
                                            <a href="novo_produto.php">Novo Produto</a><br>
                                            <a href="lista_produto.php">Gerenciar Produtos</a><br>                                            
                                        ';
                            } else {
                                echo '
                                            Voc&ecirc; n&atilde;o tem acesso a nenhum cadastro no momento.                                        
                                        ';
                            }
                            ?>
                        </td>
                        <td style="vertical-align:top; text-align:left;">
                            <!-- TABELA QUE LISTA OS PRODUTOS CADASTRADOS NO BANCO DE DADOS -->
                            <div class="w3-container">
                                <h2>LISTA DE PRODUTOS</h2>
                                <?php
                                $sql = "SELECT * FROM tb_produto;";

                                //comando php que executa uma string SQL no banco de dados
                                //sem isso, sem chance de funcionar.
                                $tabela = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));

                                echo '<table class="w3-table-all">
                                            <thead>
                                                <tr class="w3-red">
                                                    <th>FOTO</th>
                                                    <th>NOME</th>
                                                    <th>PREÇO</th>
                                                    <th>CATEGORIA</th>
                                                    <th><center>ALTERAR</center></th>
                                                    <th><center>EXCLUIR</center></th>                                                        
                                                </tr>
                                            </thead>';

                                while ($linha = mysqli_fetch_row($tabela)) {
                                    $sql = "SELECT nome_categoria FROM tb_categoria WHERE id_categoria='" . $linha[3] . "';";
                                    $tabela_categoria = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));

                                    $nome_categoria = '';
                                    while ($linha_categoria = mysqli_fetch_row($tabela_categoria)) {
                                        $nome_categoria = $linha_categoria[0];
                                    }

                                    echo '<tr>
                                                <td><img style="height:150px" src="imagens/' . $linha[1] . '.jpg"></img></td>
                                                <td>' . $linha[1] . '</td>
                                                <td>R$ ' . number_format($linha[2], 2, ',', '.') . '</td>
                                                <td>' . $nome_categoria . '</td>
                                                <td><center><a href="altera_produto.php?codigo=' . $linha[0] . '"><img src="imagens/alterar.png"></a></center></td>
                                                <td><center><a href="exclui_produto.php?codigo=' . $linha[0] . '"><img src="imagens/excluir.png"></a></center></td>                                                    
                                             </tr>';
                                }
                                echo '</table>';
                                ?>
                            </div>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>

</html>