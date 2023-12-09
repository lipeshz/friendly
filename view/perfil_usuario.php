<?php 
session_start();
require_once('../model/PostDAO.php');
require_once('../model/UsuarioDAO.php');
$dao_p = new PostDAO();
$dao_u = new UsuarioDAO();
$posts = $dao_p->obter_por_publicador($_GET['id_publicador']);
$publicador = $dao_u->obter($_GET['id_publicador']);
if(isset($_SESSION['id_usuario'])){
    $usuario = $dao_u->obter($_SESSION['id_usuario']);
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Friendly: <?php echo $publicador->get_nome() ?></title>
</head>
    <body>
        <?php 
            echo "
            <h3>".$publicador->get_nome()."</h3>
            <h4>@".$publicador->get_nick()."</h4>
            ";
            if(isset($_SESSION['id_usuario'])){
                if($_GET['id_publicador'] == $_SESSION['id_usuario']){
                    echo "
                    <button class='editar-perfil-abrir' data-modal-target='#editar-form'>Editar</button>
                    <div class='editar-perfil-form' id='editar-form'>
                        <div class='form-header'>
                            <div class='titulo'>Editar perfil</div>
                            <button class='editar-perfil-fechar'>X</button>
                        </div>
                        <form id='formulario-editar'>
                            <label>Nome</label>
                            <input type='text' id='nome' value='".$usuario->get_nome()."'>
                            <input type='submit' id='enviar' value='Enviar'>
                        </form>
                    </div>
                    <div id='overlay'></div>
                    ";
                }
            }
            
            foreach($posts as $posts_arr){
                $post = $posts_arr;
                echo "
                    <a href='perfil_usuario.php?id_publicador=".$post->get_id_publicador()."' style='text-decoration: none;'>
                        <div class='publicacao' id='" . $post->get_id_post() . "'>
                            <div class='nome-publicador'>
                                <span class='nome-publicador'>" . $publicador->get_nome() . "</span>
                    </a>
                                </br>
                                <span class='nick-publicador'>@" . $publicador->get_nick() . "</span>
                            </div>
                            <div class='texto'>
                    <a href='perfil_usuario.php?id_post=".$post->get_id_post()."' style='text-decoration: none;'>
                                <span class='texto'>" . $post->get_texto() . "</span>
                            </div>
                            <div class='anexo'>
                                <img src='../img" . $post->get_anexo() . "' alt='' srcset=''>
                            </div>
                    </a>
                            <div class='curtidas'>
                                <p>" . $post->get_curtida() . "</p>
                            </div>
                ";
                if(isset($_SESSION["id_usuario"])){
                    echo "
                    <form method='post' action='../controller/curtir_post.php'>
                        <div class='curtir-post'>
                            <input type='hidden' name='id_post' value='" . $post->get_id_post() . "'>
                            <input type='submit' name='curtir' value='Curtir'>
                        </div>
                    </form>";
                    if($_SESSION['id_usuario'] == $post->get_id_publicador()){
                        echo "
                            <form method='post' action='../controller/excluir_post.php'>
                                <div class='excluir-post'>
                                    <input type='hidden' name='id_post' value='" . $post->get_id_post() . "'>
                                    <input type='submit' name='excluir' value='Excluir'>
                                </div>
                            </form>
                        </div>
                        </br>";
                    }
                }                  
            }
        ?>

        <script src="../js/editar_perfil.js"></script>
    </body>
</html>