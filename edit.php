<?php
    if(!empty($_GET['id']))
    {
        include_once('config.php');

        $id = $_GET['id'];

        $sqlSelect = "SELECT * FROM usuarios WHERE id=$id";

        $result = $conexao->query($sqlSelect);

        if($result->num_rows > 0)
        {
            while($user_data = mysqli_fetch_assoc($result))
            {
                $firstname = $user_data["firstname"];
                $lastname = $user_data["lastname"];
                $email = $user_data["email"];
                $celular = $user_data["telefone"];
                $senha = $user_data["password"];
                $senhaConfirmada = $user_data["confirmpassword"];
                $genero = $user_data["genero"];
            }
        }
        else
        {
            header('Location: sistema.php');
        }
        
    }
    else
    {
        header('Location: sistema.php');
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
    <title>Formulário</title>
    <script src="script/script.js" defer></script>
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
                <a href="sistema.php" class="action-btn">Voltar</a>
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
                    <form method="POST" id="form-content" action="saveEdit.php">
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
                                <input value="<?php echo $firstname ?>" id="firstname" type="text" required name="firstname" placeholder="Digite seu primeiro nome">
                            </div>
                            <div class="input-box">
                                <label for="lastname">Sobrenome</label>
                                <input value="<?php echo $lastname ?>" id="lastname" type="text" required name="lastname" placeholder="Digite seu sobrenome">
                            </div>
                            <div class="input-box">
                                <label for="email">E-mail</label>
                                <input value="<?php echo $email ?>" id="email" type="email" required name="email" placeholder="Digite seu e-mail">
                            </div>
                            <div class="input-box">
                                <label for="number">Celular</label>
                                <input value="<?php echo $celular ?>" id="number" type="tel"  name="number" placeholder="(xx) xxxxx-xxxx" onkeyup="handlePhone(event)" required>
                            </div>
                            <div class="input-box">
                                <label for="password">Senha</label>
                                <input value="<?php echo $senha ?>" id="password" type="text" required name="password" placeholder="Digite sua senha">
                            </div>
                            <div class="input-box">
                                <label for="confirmpassword">Confirme sua senha</label>
                                <input value="<?php echo $senhaConfirmada ?>" id="confirmpassword" type="text" required name="confirmpassword" placeholder="Digite sua senha novamente">
                            </div>
                        </div>
                        <div class="gender-inputs">
                            <div class="gender-title">
                                <h6>Gênero</h6>
                            </div>
                            <div class="gender-group">
                                <div class="gender-input">
                                    <input type="radio" id="female" name="gender" <?php echo ($genero == 'Feminino') ? 'checked' : ''  ?> value="Feminino">
                                    <label for="female">Feminino</label>
                                </div>
                                <div class="gender-input">
                                    <input type="radio" id="male" name="gender" value="Masculino" <?php echo ($genero == 'Masculino') ? 'checked' : ''  ?>>
                                    <label for="male">Masculino</label>
                                </div>
                                <div class="gender-input">
                                    <input type="radio" id="others" name="gender" value="Outros" <?php echo ($genero == 'Outros') ? 'checked' : ''  ?>>
                                    <label for="others">Outros</label>
                                </div>
                                <div class="gender-input">
                                    <input type="radio" id="none" name="gender" value="None" <?php echo ($genero == 'None') ? 'checked' : ''  ?>>
                                    <label for="none">Prefiro não dizer</label>
                                </div>
                            </div>
                        </div>
                        <div class="input-submit">
                            <input type="hidden" name="id" value="<?php echo $id ?>" >
                            <input type="submit" name="update" id="update" value="Enviar">
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