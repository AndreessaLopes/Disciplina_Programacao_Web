<?php
require_once('conexao.php');
session_start();

// Verifica se o usuário fez login corretamente
if (!isset($_SESSION['login'])) {
    header('location:index.php');
} else {
    // Constroi a string SQL com base no login já verificado na página de login
    $sql = "SELECT * FROM tb_usuario WHERE login_usuario='" . $_SESSION['login'] . "';";

    // Executa a consulta SQL para buscar os dados do usuário
    $tabela = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));

    // Prepara um vetor para receber os dados do usuário
    $dados_usuario = '';

    while ($linha = mysqli_fetch_row($tabela)) {
        // Busca o vetor com as informações do usuário e coloca no vetor dados_usuario
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
                            <form method="post" action="salva_produto.php" enctype="multipart/form-data">
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
                                            <input type="text" size="70" name="nome_produto" required />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Pre&ccedil;o:
                                        </td>
                                        <td>
                                            <input type="text" name="preco_produto" id="preco_produto" required placeholder="0,00">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Categoria:
                                        </td>
                                        <td>
                                            <select name="id_categoria" required>
                                                <?php
                                                $sql = "SELECT * FROM tb_categoria;";
                                                $tabela = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
                                                while ($linha = mysqli_fetch_row($tabela)) {
                                                    echo '<option value="' . $linha[0] . '">' . $linha[1] . '</option>';
                                                }
                                                ?>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Foto:
                                        </td>
                                        <td>
                                            <input type="file" size="30" name="foto_produto" />
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