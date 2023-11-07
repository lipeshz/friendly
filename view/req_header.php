<?php 
require_once('../model/PostDAO.php');
require_once('../model/UsuarioDAO.php');
$dao = new UsuarioDAO();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Friendly - Página Incial</title>
</head>
<body>
    
        <?php
        if(isset($_SESSION['email'])) {
            $usuario = $dao->obter($_SESSION['id_usuario']);
            echo '
            <form action="../controller/sair.php">
                <div class="sair-usuario">
                    <input type="hidden" name="sair" value="' . $_SESSION['sair']=true . '">
                    <input type="submit" value="Sair">
                </div>
            </form>
            <p><a href="cadastro_post.php" style="text-decoration: none;">Publicar</a></p>';
        }else{
            echo '
            <p><a href="login.php" style="text-decoration: none;">Entrar</a></p>
            <p><a href="cadastro_usuario.php" style="text-decoration: none;">Cadastrar</a></p>';
        }
        ?>
        
    
</body>
</html>