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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Criar Post</title>
</head>
    <body>
        <form action="../controller/cadastro_post.php" method="post" enctype="multipart/form-data">
            <div class="entrar-post">
                <input type="text" name="texto" id="texto" placeholder="O que está acontecendo?">
            </div>

            <div class="entrar-post">
                <input type="file" name="anexo" accept="image/*" id="anexo">
            </div>

            <?php 
            echo '
            <div class="publicar">
                <input type="submit" name="id_publicador" value="Enviar" class="enviar">
            </div>';
            ?>
            </div>
        </form>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    </body>
</html>
