<?php
require_once 'clsProfissao.php';
$profissao = new clsProfissao();

echo "<html><body><center>";

echo '<h2>O QUE QUER FAZER?</h2>';
echo '<a href="?acao=inserir">INSERIR UM DADO NO BANCO DE DADOS</a><br>';
echo '<a href="?acao=consultar">EXECUTAR UMA CONSULTA NO BANCO DE DADOS</a><br>';
echo '<a href="?acao=listar">EXIBIR CONSULTA NA FORMA DE TABELA</a><br>';
echo '</center><br>';

$acao = $_GET['acao'] ?? '';

switch ($acao) {
    case 'inserir':
        $profissao->inserir("Rodrigo Oliveira", 1500, "Programador");
        echo 'Registro inserido com sucesso';
        break;

    case 'consultar':
        $registros = $profissao->selecionarTodos();
        if ($registros) {
            foreach ($registros as $linha) {
                echo 'Id: ' . htmlspecialchars($linha['id']) . '<br>';
                echo 'Nome: ' . htmlspecialchars($linha['nome']) . '<br>';
                echo 'Idade: ' . htmlspecialchars($linha['salario']) . '<br>';
                echo 'Cargo: ' . htmlspecialchars($linha['cargo']) . '<br><br>';
            }
        } else {
            echo 'Nenhum registro encontrado.';
        }
        break;

    case 'listar':
        $registros = $profissao->selecionarTodos();
        if ($registros) {
            echo '<table border="1px">';
            echo '<tr><th>ID</th><th>Nome</th><th>Salario</th><th>Cargo</th></tr>';
            foreach ($registros as $linha) {
                echo '<tr>';
                echo '<td>' . htmlspecialchars($linha['id']) . '</td>';
                echo '<td>' . htmlspecialchars($linha['nome']) . '</td>';
                echo '<td>' . htmlspecialchars($linha['salario']) . '</td>';
                echo '<td>' . htmlspecialchars($linha['cargo']) . '</td>';
                echo '<td><a href="?acao=excluir&id=' . urlencode($linha['id']) . '">APAGAR</a></td>';
                echo '</tr>';
            }
            echo '</table>';
        } else {
            echo 'Nenhum registro encontrado.';
        }
        break;

    case 'excluir':
        $id = $_GET['id'] ?? 0;
        if ($profissao->excluir($id)) {
            echo 'Registro apagado com sucesso';
        } else {
            echo 'Problema ao apagar o registro.';
        }
        break;

    default:
        echo '<p>Escolha uma opção do menu acima.</p>';
        break;
}

echo "</body></html>";
