<?php
session_start();
$mensagem = '<div class="message"> <h1>Fa&ccedil;a seu login no sistema</h1></div>';
$mensagem .= '</br>

<div class="form-container">
    <form action="login.php" method="post">
        Login: <input type="text" name="txtLogin" class="form"> <br>
        Senha: <input type="password" name="txtSenha" class="form"> <br>
        <input type="submit" name="btnEnviar" class="button"></input>
    </form>
</div>';

if (isset($_SESSION['erro'])) {
    $mensagem = '<div class="message"> <h1>Seu login ou senha est&aacute; incorreto</h1> </div>';
    $mensagem .= '</br>
    <div class="form-container">
        <form action="login.php" method="post">
            Login: <input type="text" name="txtLogin" class="form"> <br>
            Senha: <input type="password" name="txtSenha" class="form"> <br>
            <input type="submit" name="btnEnviar" class="button"></input>
        </form>
    </div>';
}

if (isset($_SESSION['login'])) {
    $mensagem = '<div class="message"> <h1>Voc&ecirc; j&aacute; est&aacute logado no sistema</h1> </div>';
    $mensagem .= '<div class="message"></br></br>
    <a href="sobre.php">P&aacutegina Sobre</a>
	<a href="fotos.php">P&aacutegina Fotos</a>
	<a href="musicas.php">P&aacutegina Musicas</a><br><br>
    <a href="logout.php">SAIR DO SISTEMA</a><br><br>
    </div>';
}
?>

<html>
<title>Imagine Dragons</title>

<head>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="bg-image"></div>
    <div class="bg-text">
        <?php echo $mensagem; ?>
    </div>
</body>

</html>