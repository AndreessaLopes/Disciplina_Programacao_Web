<?php
session_start();
if (isset($_SESSION['login'])) {
    $mensagem = 'Seja bem vindo(a) ' . $_SESSION['login'] . '! </br> Neste momento voc&ecirc; est&aacute; logado em nosso sistema e na p&aacute;gina Musicas. </br> <a href="logout.php">SAIR</a></br>';
} else {
    $mensagem = 'Essa p&aacute;gina &eacute; de acesso restrito! </br> <a href="index.php">VOLTAR</a></br>';
}
?>

<html>

<head>
</head>

<body>
    <center>
        <h2>
            <?php
            echo $mensagem;
            ?>
        </h2>
        </br></br>
        <a href="sobre.php">P&aacutegina Sobre</a>
        <a href="fotos.php">P&aacutegina Fotos</a>
        <a href="musicas.php">P&aacutegina Musicas</a>
    </center>
</body>

</html>