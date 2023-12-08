<?php 
session_start();
require_once('../model/PostDAO.php');
require_once('../model/UsuarioDAO.php');
$dao_p = new PostDAO();
$dao_u = new UsuarioDAO();
$post = $dao_p->obter($_GET['id_post']);
if(isset($_SESSION['id_usuario'])){
    $usuario = $dao_u->obter($_SESSION['id_usuario']);
}
$publicador = $dao_u->obter($post->get_id_publicador());
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo "".$publicador->get_nick().":  '".$post->get_texto()."'"; ?></title>
</head>
    <body>
        <?php 
        echo "
        <div class='post'>
            <div class='publicador-info'>
                <h4>".$publicador->get_nome()."</h4>
                <h5>@".$publicador->get_nick()."</h5>
            </div>
            ";
            if($publicador->get_id_usuario() == $_SESSION['id_usuario']){
                echo "
                <div class='excluir'>

                </div>
                ";
            }
            echo "
        </div>
        ";
        ?>
    </body>
</html>