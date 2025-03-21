<?php
if (isset($_GET['txtNomeImagem'])) {
    $nomeImagem = htmlspecialchars($_GET['txtNomeImagem']);
    echo 'A imagem recortada foi enviada com sucesso! <br><br>';
    echo '<img src="imagens/' . $nomeImagem . '" alt="Imagem Recortada">';
} else {
    echo 'Nenhuma imagem foi especificada.';
}
?>