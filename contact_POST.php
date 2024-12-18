<?php
    if(isset($_POST['submit']))
    {
        include_once('config.php');

        $firstnome = $_POST["firstname"];
        $lastname = $_POST["lastname"];
        $email = $_POST["email"];
        $celular = $_POST["number"];
        $senha = $_POST["password"];
        $senhaConfirmada = $_POST["confirmpassword"];
        $genero = $_POST["gender"];

        $result = mysqli_query($conexao, "INSERT INTO usuarios(firstname,lastname,email,telefone,genero,password,confirmpassword) 
        VALUES ('$firstnome','$lastname','$email','$celular','$genero','$senha','$senhaConfirmada')");

        header('Location: login.html');
    }
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" 
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" 
        crossorigin="anonymous" 
        referrerpolicy="no-referrer" 
    />
    <link rel="shortcut icon" type="imagex/png" href="./images/BFR-logo.webp">
    <script src="script/script.js" defer></script>
    <title>Formulário</title>
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
    <div class="container-body">
        <div class="container-form">
            <div class="form-image">
                <img src="./images/botafogo-logo-form.png" alt="">
            </div>
            <div class="form">
                <div class="blur">
                    <form method="POST" id="form-content" action="contact_POST.php">
                        <div class="form-header">
                            <div class="title">
                                <h1>Cadastre-se</h1>
                            </div>
                            <div class="login-button">
                                <a href="index.html">Home</a>
                            </div>
                        </div>
                        <div class="input-group">
                            <div class="input-box">
                                <label for="firstname">Primeiro Nome</label>
                                <input id="firstname" type="text" required name="firstname" placeholder="Digite seu primeiro nome">
                            </div>
                            <div class="input-box">
                                <label for="lastname">Sobrenome</label>
                                <input id="lastname" type="text" required name="lastname" placeholder="Digite seu sobrenome">
                            </div>
                            <div class="input-box">
                                <label for="email">E-mail</label>
                                <input id="email" type="email" required name="email" placeholder="Digite seu e-mail">
                            </div>
                            <div class="input-box">
                                <label for="number">Celular</label>
                                <input id="number" type="tel" required name="number" placeholder="(xx) xxxxx-xxxx" onkeyup="handlePhone(event)" >
                            </div>
                            <div class="input-box">
                                <label for="password">Senha</label>
                                <input id="password" type="password" required name="password" placeholder="Digite sua senha">
                            </div>
                            <div class="input-box">
                                <label for="confirmpassword">Confirme sua senha</label>
                                <input id="confirmpassword" type="password" required name="confirmpassword" placeholder="Digite sua senha novamente">
                            </div>
                        </div>
                        <div class="gender-inputs">
                            <div class="gender-title">
                                <h6>Gênero</h6>
                            </div>
                            <div class="gender-group">
                                <div class="gender-input">
                                    <input type="radio" id="female" name="gender" value="Feminino">
                                    <label for="female">Feminino</label>
                                </div>
                                <div class="gender-input">
                                    <input type="radio" id="male" name="gender" value="Masculino">
                                    <label for="male">Masculino</label>
                                </div>
                                <div class="gender-input">
                                    <input type="radio" id="others" name="gender" value="Outros">
                                    <label for="others">Outros</label>
                                </div>
                                <div class="gender-input">
                                    <input type="radio" id="none" name="gender" value="None">
                                    <label for="none">Prefiro não dizer</label>
                                </div>
                            </div>
                        </div>
                        <div class="input-submit">
                            <input type="submit" name="submit" value="Enviar">
                        </div>
                        <div class="hidden" id="mensagem-erro">
                            <p id="error-message">As senhas não estão iguais!</p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>