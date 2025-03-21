<?php
require_once '../classes/clsCadastroProjetos.php';
require_once '../classes/clsCadastroEquipes.php'; // Certifique-se de ter a classe para gerenciar equipes

$projetos = new clsCadastroProjetos();
$equipesObj = new clsCadastroEquipes(); // Instanciar o objeto para gerenciar equipes

// Recuperar as equipes do banco de dados
$equipes = $equipesObj->selecionarTodos();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PROJETO</title>
    <link rel="stylesheet" href="../styles/style.css">
</head>

<body>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $acao = $_POST['acao'] ?? '';
        switch ($acao) {
            case 'inserir_projeto':
                $salario = str_replace(['R$', '.', ','], ['', '', '.'], $_POST['salario']);
                $projetos->inserir($_POST['nome'], $_POST['id_equipe'], $salario);
                echo 'Projeto inserido com sucesso';
                break;
            case 'atualizar_projeto':
                $projetos->selecionarTodos($_POST);
                break;
            case 'remover_projeto':
                $projetos->excluir($_POST['id']);
                echo 'Projeto removido com sucesso';
                break;
        }
    }
    ?>

    <a href="../index.php" class="back-button">Voltar</a>
    <div class="header">
        <h2>Gestão de Projetos</h2>
        <button id="addBtn">Adicionar novo projeto</button>
    </div>

    <div id="addModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>Inserir Projeto</h2>
            <form method="POST" action="">
                <input type="hidden" name="acao" value="inserir_projeto">
                <label for="nome">Nome:</label>
                <input type="text" id="nome" name="nome" required>

                <label for="id_equipe">Equipe:</label>
                <select id="id_equipe" name="id_equipe" required>
                    <option value="">Selecione uma equipe</option>
                    <?php
                    // Preencher o dropdown com as equipes
                    foreach ($equipes as $equipe) {
                        echo '<option value="' . htmlspecialchars($equipe['id']) . '">' . htmlspecialchars($equipe['nome']) . '</option>';
                    }
                    ?>
                </select>

                <label for="salario">Salário:</label>
                <input type="text" name="salario" id="salario" required placeholder="R$ 0,00" onkeyup="mascaraDinheiro(this)">

                <button type="submit">Inserir Projeto</button>
            </form>
        </div>
    </div>

    <h2>Listar Projetos</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Equipe</th>
                <th>Salário</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $projetosList = $projetos->selecionarTodos();
            foreach ($projetosList as $projeto) {
                echo '<tr>';
                echo '<td>' . htmlspecialchars($projeto['id']) . '</td>';
                echo '<td>' . htmlspecialchars($projeto['nome']) . '</td>';
                echo '<td>' . htmlspecialchars($projeto['id_equipe']) . '</td>';
                echo '<td>' . htmlspecialchars($projeto['salario']) . '</td>';
                echo '<td>';
                echo '<form method="POST" action="" style="display:inline-block;">';
                echo '<input type="hidden" name="acao" value="remover_projeto">';
                echo '<input type="hidden" name="id" value="' . htmlspecialchars($projeto['id']) . '">';
                echo '<button type="submit">Remover</button>';
                echo '</form>';
                echo '</td>';
                echo '</tr>';
            }
            ?>
        </tbody>
    </table>

    <script src="../script/script.js"></script>
</body>

</html>