<?php 
session_start();
require_once('../model/PostDAO.php');
require_once('../model/UsuarioDAO.php');
$dao_u = new UsuarioDAO();
$dao_p = new PostDAO();
$posts = $dao_p->obter_todos();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Friendly - Página Incial</title>
</head>
<body>
    <?php include 'req_header.php'; ?>

    <?php 
    foreach ($posts as $post_arr){
        $post = $post_arr;
        $_POST['id_publicador'] = $post->get_id_publicador();
        echo '
        <div class="post" id="' . $post->get_id_post() . '">
            <div id="texto">
            <span class="texto">' . $post->get_texto() . '</span>
            </div>';

        if(isset($_SESSION['id_usuario'])){
            $usuario = $dao_u->obter($_SESSION['id_usuario']);
            if($_SESSION['id_usuario'] == $post->get_id_publicador()){
                echo '
                <form method="post" action="../controller/excluir_post.php">
                    <div class="excluir-post">
                        <input type="hidden" name="id_post" value="' . $post->get_id_post() . '">
                        <input type="hidden" name="excluir" value="' . $_SESSION['excluir'] = true . '">
                        <input type="submit" name="excluir" value="Excluir">
                    </div>
                </form>';
            }else{
                echo "";
            }
        echo '
        </div>';  
        }
    }
    ?>
</body>
</html>
