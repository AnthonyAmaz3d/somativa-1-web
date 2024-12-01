<?php
    session_start();

    if(isset($_POST['submit']) && !empty($_POST['email']) && !empty($_POST['password']) )
    {
        include_once('config.php');
        $email = $_POST['email'];
        $senha = $_POST['password'];

        $sql = "SELECT * FROM usuarios WHERE email = '$email' and password = '$senha'";

        $result = $conexao->query($sql);

        if(mysqli_num_rows($result) < 1)
        {
            unset($_SESSION['email']);
            unset($_SESSION['password']);
            header('Location: login.html');
        }
        else
        {
            $_SESSION['email'] = $email;
            $_SESSION['password'] = $senha;
            header('Location: sistema.php');
        }
    }
    else
    {
        header('Location: login.html');
    }
?>