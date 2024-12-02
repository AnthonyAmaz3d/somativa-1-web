<?php 
    if(!empty($_GET['id']))
    {
        include_once('config.php');

        $user_id = $_GET['id'];
        $sql1 = "DELETE FROM socios_torcedores WHERE user_id = $user_id";
        $conexao->query($sql1);

        $id = $_GET['id'];

        $sqlSelect = "SELECT * FROM usuarios WHERE id=$id";

        $result = $conexao->query($sqlSelect);

        if($result->num_rows > 0)
        {
            $sqlDelete = "DELETE FROM usuarios WHERE id=$id";
            $resultDelete = $conexao->query($sqlDelete);
        }
    }
    header('Location: sistema.php');
?>