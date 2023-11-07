<?php 
session_start();
require_once('../model/PostDAO.php');
if(isset($_SESSION['id_usuario'])){
    require_once('../model/UsuarioDAO.php');
    $dao = new UsuarioDAO();
    $usuario = $dao->obter($_SESSION['id_usuario']);
}else{
    header("Location:../view/login.php");
}

$mensagem_post="";
if(isset($_SESSION['cad_texto_err'])){
    $mensagem_post="Campo não pode estar vazio!";
    unset($_SESSION['cad_texto_err']);
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Post</title>
</head>
    <body>
        <form action="../controller/cadastro_post.php" method="post">
            <div class="entrar-post">
                <input type="text" name="texto" id="texto" placeholder="O que está acontecendo?">
            </div>
            <?php 
            echo $mensagem_post;
            ?>
            <div class="entrar-post">
                <input type="file" name="anexo" id="anexo">
            </div>

            <?php 
            echo '
            <div class="publicar">
                <input type="submit" name="id_publicador" value="Enviar" class="Enviar">
            </div>';
            ?>
            </div>
        </form>
    </body>
</html>
