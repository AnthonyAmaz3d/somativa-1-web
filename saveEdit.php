<?php

    include_once('config.php');

    if(isset($_POST['update']))
    {
        $id = $_POST['id'];
        $firstname = $_POST["firstname"];
        $lastname = $_POST["lastname"];
        $email = $_POST["email"];
        $celular = $_POST["number"];
        $senha = $_POST["password"];
        $senhaConfirmada = $_POST["confirmpassword"];
        $genero = $_POST["gender"];

        $sqlUpdate = "UPDATE usuarios SET firstname='$firstname',lastname='$lastname',email='$email',telefone='$celular',password='$senha',confirmpassword='$senhaConfirmada',genero='$genero'
        WHERE id='$id'";

        $result = $conexao->query($sqlUpdate);
    }
    header('Location: sistema.php');
?> 