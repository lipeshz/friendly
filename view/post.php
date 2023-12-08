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
            if(isset($_SESSION['id_usuario'])){
                echo "
                <div class='curtir'>
                
                    <form method='post' action='../controller/curtir_post.php' id='form-curtir'>
                        <div class='curtir-post'>
                            <input type='hidden' name='id_post' value='" . $post->get_id_post() . "'>
                            <input type='hidden' name='curtir' value='" . $_SESSION['curtir'] = true . "'>
                            <input type='submit' name='curtir' value='Curtir'>
                        </div>
                    </form>
                </div>
                ";
                if($publicador->get_id_usuario() == $_SESSION['id_usuario']){
                    echo "
                    <div class='excluir'>
                        <form method='post' action='../controller/excluir_post.php'>
                            <div class='excluir-post'>
                                <button type='button' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#modalExcluirPost'>Excluir Post</button>
                            </div>
                        </form>
                    </div>
                    ";
                }
            }
            echo "
            <div class='texto'>
                <span>".$post->get_texto()."</span>
            </div>
        </div>
        ";
        ?>
    </body>
</html>