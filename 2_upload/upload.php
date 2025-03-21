<?php
session_start();
if (isset($_POST['txtNome'], $_POST['txtEmail'], $_POST['txtCpf'], $_POST['txtData'])) {
    $nome = $_POST['txtNome'];
    $email = $_POST['txtEmail'];
    $cpf = $_POST['txtCpf'];
    $data = date('d/m/Y', strtotime($_POST['txtData']));
    $_SESSION['txtNome'] = $nome;
    $_SESSION['txtEmail'] = $email;
    $_SESSION['txtCpf'] = $cpf;
    $_SESSION['txtData'] = $data;
    $uploadDir = 'imagens/';
    $imgRecorte = '';
    $fileName = '';
    if (isset($_FILES['imgRecorte'])) {
        $file = $_FILES['imgRecorte'];
        $fileName = uniqid('img_', true) . '.png';
        $filePath = $uploadDir . $fileName;
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0755, true);
        }
        // Check for upload errors
        if ($file['error'] !== UPLOAD_ERR_OK) {
            echo json_encode(['error' => 'Erro no upload da imagem.']);
            exit;
        }
        // Validate file type
        $allowedTypes = ['image/png', 'image/jpeg', 'image/jpg'];
        if (!in_array($file['type'], $allowedTypes)) {
            echo json_encode(['error' => 'Tipo de arquivo não permitido.']);
            exit;
        }
        if (move_uploaded_file($file['tmp_name'], $filePath)) {
            $imgRecorte = $filePath;
        } else {
            echo json_encode(['error' => 'Falha ao mover o arquivo carregado.']);
            exit;
        }
    }
    $_SESSION['imgRecorte'] = $imgRecorte;
    echo json_encode(['redirectUrl' => 'carteirinha.php']);
    exit;
}
?>