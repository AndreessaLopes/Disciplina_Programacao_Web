<?php
$acao = $_GET['acao'] ?? '';
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REGISTRO DE PROJETOS</title>
    <link rel="stylesheet" href="./styles/style_index.css">
</head>

<body>
    <div class="container">
        <h1>REGISTRO DE PROJETOS</h1>
        <a href="?acao=funcionario">CADASTRO DE FUNCIONÁRIOS</a>
        <a href="?acao=equipes">CADASTRO DE EQUIPES</a>
        <a href="?acao=projetos">CADASTRO DE PROJETOS</a>

        <?php
        switch ($acao) {
            case 'funcionario':
                header('Location: ./pages/pagina_funcionario.php');
                break;
            case 'equipes':
                header('Location: ./pages/pagina_equipe.php');
                break;
            case 'projetos':
                header('Location: ./pages/pagina_projeto.php');
                break;
            default:
                echo '<p>SELECIONE ALGUMA OPÇÃO ACIMA!</p>';
                break;
        }
        ?>
    </div>
</body>

</html>