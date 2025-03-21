<?php
session_start();

if (isset($_SESSION['txtNome'], $_SESSION['txtEmail'], $_SESSION['txtCpf'], $_SESSION['txtData'], $_SESSION['imgRecorte'])) {

    $nome = $_SESSION['txtNome'];
    $email = $_SESSION['txtEmail'];
    $cpf = $_SESSION['txtCpf'];
    $data = $_SESSION['txtData'];
    $imgRecorte = $_SESSION['imgRecorte'];

    echo " <div class='bg-image'></div>
    <div class='container'>
    <div class='carteirinha'>
        <div class='carteirinha-header'>
            <h2>Hello Kitty</h2>
        </div>
        <div class='carteirinha-body'>
            <div class='carteirinha-info'>
                <p><strong>Nome:</strong> $nome</p>
                <p><strong>Email:</strong> $email</p>
                <p><strong>CPF:</strong> $cpf</p>
                <p><strong>Data de Nascimento:</strong> $data</p>
            </div>
            <div class='carteirinha-foto'>
                <img src='$imgRecorte' alt='Foto do Usuário'>
            </div>
        </div>
        <div class='carteirinha-footer'>
            <p>Carteirinha Gerada</p>
        </div>
    </div>
</div>
";


    session_unset();
    session_destroy();
} else {
    echo "Nenhum dado encontrado. Por favor, faça o cadastro novamente.";
}
?>

<style>
    .carteirinha {
        width: 400px;
        height: 250px;
        border: 2px solid #ff3198;
        border-radius: 10px;
        padding: 20px;
        font-family: "Comic Sans MS", cursive, sans-serif;
        display: flex;
        flex-direction: column;
        justify-content: center;
        background-color: rgba(248, 208, 240, 0.586);
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    }

    .carteirinha-header h2 {
        text-align: center;
        margin: 0;
        font-size: 20px;
        color: #ff3198;
    }

    .carteirinha-body {
        display: flex;
        justify-content: space-between;
    }

    .carteirinha-info {
        width: 60%;
    }

    .carteirinha-info p {
        margin: 5px 0;
        color: #ff3198;
    }

    .carteirinha-foto img {
        width: 100px;
        height: 100px;
        border-radius: 20%;
        object-fit: cover;
        border: 2px solid #ff3198;
    }

    .carteirinha-footer {
        text-align: center;
        margin-top: 10px;
        font-weight: bold;
        color: #ff3198;
    }

    .container {
        position: relative;
        z-index: 1;
        display: flex;
        flex-direction: column;
        /* Coloca os elementos verticalmente */
        justify-content: center;
        align-items: center;
        height: 100vh;
    }


    .bg-image {
        background-image: url("https://i.pinimg.com/736x/e9/9b/98/e99b9897c4859a584dd8bd28d5f32e43--weheartit-hello-kitty.jpg");
        filter: blur(3px);
        -webkit-filter: blur(6px);
        position: fixed;
        /* Mantém a imagem fixa no fundo */
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        z-index: -1;
        /* Camada negativa para ficar atrás do conteúdo */
    }
</style>