<?php
session_start();
include_once('config.php');

if (!isset($_SESSION['email'])) {
    header('Location: login.html');
    exit;
}

// Verifica se o usuário já tem um plano
$email = $_SESSION['email'];
$sql = "SELECT id FROM socios_torcedores WHERE user_id = (SELECT id FROM usuarios WHERE email = ?)";
$stmt = $conexao->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // Redireciona para a página de sucesso ou outra página específica se já tiver um plano
    header('Location: processa_plano.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Escolha seu Plano</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <header>
        <div class="navbar">
            <div class="logo">
                <a href="index.html">BOTAFOGO</a>
                <img src="./images/BFR-logo.webp" alt="">
            </div>
            <ul class="links">
                <li><a href="index.html" class="home">Home</a></li>
                <li><a href="about.html" class="sobre">Sobre</a></li>
                <a href="login.html" class="action-btn">Login</a>
            </ul>
            <div class="toggle-btn">
                <i class="fa-solid fa-bars"></i>
            </div>
        </div>
        <div class="dropdown-menu">
            <li><a href="index.html" class="home">Home</a></li>
            <li><a href="about.html" class="sobre">Sobre</a></li>
        </div>
    </header>
    <div class="container mt-5">
        <h1 class="text-center">Escolha seu Plano de Sócio-Torcedor</h1>
        <form action="processa_plano.php" method="POST" class="mt-4">
            <div class="form-check">
                <input class="form-check-input" type="radio" name="plano" value="BRANCO" id="BRANCO" required>
                <label class="form-check-label" for="BRANCO">Plano BRANCO</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="plano" value="PRETO" id="PRETO" required>
                <label class="form-check-label" for="PRETO">Plano PRETO</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="plano" value="ALVINEGRO" id="ALVINEGRO" required>
                <label class="form-check-label" for="ALVINEGRO">Plano ALVINEGRO</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="plano" value="GLORIOSO" id="GLORIOSO" required>
                <label class="form-check-label" for="GLORIOSO">Plano GLORIOSO</label>
            </div>
            <div class="mt-4">
                <button type="submit" class="btn btn-primary w-100">Confirmar</button>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>