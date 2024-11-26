<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="imagex/png" href="./images/BFR-logo.webp">
    <link rel="stylesheet" href="./css/main.css">
    <title>Dados Processados PHP</title>
</head>
<body>
    <?php
        $firstnome = $_GET["firstname"];
        $lastname = $_GET["lastname"];
        $email = $_GET["email"];
        $celular = $_GET["number"];
        $senha = $_GET["password"];
        $senhaConfirmada = $_GET["confirmpassword"];
        $genero = $_GET["gender"];
    ?>
    <header>
        <div class="navbar">
            <div class="logo">
                <a href="index.html">BOTAFOGO</a>
                <img src="./images/BFR-logo.webp" alt="">
            </div>
            <ul class="links">
                <li><a href="index.html" class="home">Home</a></li>
                <li><a href="about.html" class="sobre">Sobre</a></li>
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
    <div class="container-dados">
        <div class="dados">
            <h1>Dados Processados pelo GET com PHP</h1>
            <div id="dados-processados">
                <p><b>Primeiro nome: </b> <?php echo $firstnome; ?> <p/>
                <p><b>Sobrenome: </b> <?php echo $lastname; ?> <p/>
                <p><b>Email:</b> <?php echo $email; ?> </p>
                <p><b>Celular: </b> <?php echo $celular; ?> <p/>
                <p><b>Senha: </b> <?php echo $senha; ?> <p/>
                <p><b> Confirmação de senha: </b> <?php echo $senhaConfirmada; ?> <p/>
                <p><b> Gênero: </b> <?php echo $genero; ?> <p/>
            </div>
        </div>
    </div>
</body>
</html>