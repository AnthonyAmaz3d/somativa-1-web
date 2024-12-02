<?php
session_start();
include_once('config.php');

// Verifica se o usuário está logado
if (!isset($_SESSION['email'])) {
    header('Location: login.html');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['plano'])) {
    $email = $_SESSION['email'];
    $plano = $_POST['plano'];

    // Obtém o ID do usuário
    $sql = "SELECT id FROM usuarios WHERE email = ?";
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if ($user) {
        $user_id = $user['id'];

        // Insere o plano na tabela socios_torcedores
        $sql = "INSERT INTO socios_torcedores (user_id, plano) VALUES (?, ?)";
        $stmt = $conexao->prepare($sql);
        $stmt->bind_param("is", $user_id, $plano);

        if ($stmt->execute()) {
            $message = "Plano escolhido com sucesso!";
        } else {
            $message = "Erro ao registrar o plano.";
        }
    } else {
        $message = "Usuário não encontrado.";
    }
} else {
    $message = "Nenhum plano selecionado.";
}

// Lista todos os usuários e os planos escolhidos
$sql = "SELECT usuarios.firstname, usuarios.lastname, socios_torcedores.plano 
        FROM socios_torcedores 
        INNER JOIN usuarios ON socios_torcedores.user_id = usuarios.id";
$result = $conexao->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Lista de Sócios-Torcedores</title>
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
        <h1 class="text-center">Planos de Sócio-Torcedor</h1>
        <p class="alert alert-info text-center"><?php echo $message; ?></p>
        <h2 class="mt-4">Lista de Sócios-Torcedores</h2>
        <?php if ($result->num_rows > 0): ?>
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Plano</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo $row['firstname'] . " " . $row['lastname']; ?></td>
                            <td><?php echo $row['plano']; ?></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p class="alert alert-warning">Nenhum sócio-torcedor registrado.</p>
        <?php endif; ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>