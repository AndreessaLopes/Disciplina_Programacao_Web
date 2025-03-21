<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CARTEIRINHA</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.css" />
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="bg-image"></div>
    <h2 class="register">Registre sua HelloKitty</h2>
    <div class="container">
        <form action="upload.php" method="post" enctype="multipart/form-data" class="formCadastro" id="formCadastro">
            <label for="txtNome">Nome:</label>
            <input type="text" name="txtNome" id="txtNome">
            <label for="foto">Foto:</label>
            <input type="file" id="txtCaminhoImagem" accept="image/*">
            <div>
                <img id="previsaoImagem" style="display:none;">
            </div>
            <label for="txtEmail">Email:</label>
            <input type="email" name="txtEmail" id="txtEmail">
            <label for="txtCpf">CPF:</label>
            <input type="text" name="txtCpf" id="txtCpf">
            <label for="txtData">Data de Nascimento:</label>
            <input type="date" name="txtData" id="txtData">
            <button id="btnEnviar" type="button" style="display:none;">Enviar</button>
        </form>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.js"></script>
    <script>
        let cropper;
        const txtCaminhoImagem = document.getElementById('txtCaminhoImagem');
        const previsaoImagem = document.getElementById('previsaoImagem');
        const btnEnviar = document.getElementById('btnEnviar');
        const formCadastro = document.getElementById('formCadastro');

        txtCaminhoImagem.addEventListener('change', (event) => {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = () => {
                    previsaoImagem.src = reader.result;
                    previsaoImagem.style.display = 'block';
                    if (cropper) {
                        cropper.destroy();
                    }
                    cropper = new Cropper(previsaoImagem, {
                        aspectRatio: 1,
                        viewMode: 2
                    });
                    btnEnviar.style.display = 'inline';
                };
                reader.readAsDataURL(file);
            }
        });

        btnEnviar.addEventListener('click', () => {
            if (cropper) {
                cropper.getCroppedCanvas().toBlob((blob) => {
                    const formData = new FormData(formCadastro);
                    formData.append('imgRecorte', blob, 'imgRecorte.png');
                    fetch('upload.php', {
                            method: 'POST',
                            body: formData
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.redirectUrl) {
                                window.location.href = data.redirectUrl;
                            } else {
                                alert('Erro: ' + data.error || 'Erro desconhecido.');
                            }
                        })
                        .catch(error => {
                            console.error('Erro:', error);
                        });
                });
            }
        });
    </script>
</body>

</html>