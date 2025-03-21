<?php

//captura de variaveis
$codigo_hidden = $_POST['hddCodigo'];
$codigo = $_POST['txtCodigo'];
$nome = $_POST['txtNome'];
$email = trim($_POST['txtEmail']);
$arquivo = $_FILES['txtArquivo'];
$textArea = $_POST['txaMensagem'];
$opcao_jogos = $_POST['slcJogos'];
$opcao_prato = $_POST['slcPrato'];
$image = $_POST['imgImagem'];

$senha = 'Desabilitada';
if (isset($_POST['txtSenha'])) {
    $senha = $_POST['txtSenha'];
}

if (empty($nome)) {
    echo 'Nome n&atilde;o informado<br>';
} else {
    echo 'Nome: ' . $nome . '<br>';
}

if (empty($senha)) {
    echo 'Senha n&atilde;o informada<br>';
} else {
    echo 'Senha: ' . $senha . '<br>';
}

$datanasc = 'N&atilde;o informada';
if (!empty($_POST['txtDataNasc'])) {
    $datanasc = date('d/m/Y', strtotime($datanasc));
}

$renda = 'N&atilde;o informada';
if (isset($_POST['rdbRenda'])) {
    $renda = $_POST['rdbRenda'];
}

if ($renda == 1) {
    $renda = "Pobre";
} else if ($renda == 2) {
    $renda = "Muito Pobre";
} else if ($renda == 3) {
    $renda = "Miser&aacute;vel";
}

$macacos = '';
if (isset($_POST['chkGorila'])) {
    $macacos .= ' Gorila';
}
if (isset($_POST['chkOrangotango'])) {
    $macacos .= ' Orangotango';
}
if (isset($_POST['chkChimpaze'])) {
    echo 'bosta';
    $macacos .= ' Chimpaz&eacute;';
}
if (isset($_POST['chkBonobo'])) {
    $macacos .= ' Bonobo';
}

$opcao_compras = ['Nada selecionado'];
if (isset($_POST['slcCompras'])) { {
        $opcao_compras = $_POST['slcCompras'];
    }
}

$opcao_preferidos = [];
if (isset($_POST['rdbLasanha'])) {
    $opcao_preferidos[] = "Lasanha";
}
if (isset($_POST['rdbPenne'])) {
    $opcao_preferidos[] = "Macarrão Penne";
}
if (isset($_POST['rdbBoi'])) {
    $opcao_preferidos[] = "Bife de Boi";
}
if (isset($_POST['rdbPorco'])) {
    $opcao_preferidos[] = "Bife de Porco";
}

// Exibe as opções selecionadas
if (empty($opcao_preferidos)) {
    $opcao_preferidos_texto = 'Nada selecionado';
} else {
    $opcao_preferidos_texto = implode(', ', $opcao_preferidos);
}

echo 'Pratos preferidos: ' . $opcao_preferidos_texto . '<br>';


//exibicao de variaveis
echo 'C&oacute;digo escondido   : ' . $codigo_hidden . '<br>';

echo 'C&oacute;digo: ' . $codigo . '<br>';

echo 'Email: ' . $email . '<br>';

echo 'Data de Nascimento: ' . $datanasc . '<br>';

echo 'Arquivo: ' . $arquivo['name'] . ' - Tamanho: ' . $arquivo['size'] . ' KB<br>';

echo 'Renda: ' . $renda . '<br>';

echo 'Qual seu macaco favorito: ' . $macacos . '<br>';

echo 'Texto digitado: ' . $textArea . '<br>';

echo 'Quanto voc&ecirc; gosta de jogos: ' . $opcao_jogos . '<br>';

echo 'Quanto voc&ecirc; gosta desses pratos: ' . $opcao_prato . '<br>';

echo 'Lista de compras: <br>';
echo '<ul>';
foreach ($opcao_compras as $item) {
    echo '<li>' . $item . '</li>';
}
echo '</ul>';

echo 'Imagem: ' . $image . '<br>';
?>