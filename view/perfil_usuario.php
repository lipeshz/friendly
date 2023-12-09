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
    <link rel="stylesheet" href="../css/editar_usuario.css">
    <title>Friendly: <?php echo $publicador->get_nome() ?></title>
</head>
    <body>
        <?php 
            echo "
            <h3>".$publicador->get_nome()."</h3>
            <h4>@".$publicador->get_nick()."</h4>
            <h5>".$publicador->get_biografia()."</h5>
            ";
            if(isset($_SESSION['id_usuario'])){
                if($_GET['id_publicador'] == $_SESSION['id_usuario']){
                    echo "
                    <button>Personalizar</button>
                    <dialog>
                    <div class='modal' id='modal'>
                        <button>X</button>
                        <div class='modal-header'>
                            <div class='title'>Editar Perfil</div>
                        </div>
                        <div class='modal-body'>
                            <form id='formulario-editar' action='../controller/editar_usuario.php' method='post'>
                                <div class='nome-editar'>
                                    <label>Nome</label>
                                    <input name='nome' type='text' id='nome' value='".$usuario->get_nome()."'>
                                </div>
                                </br>

                                <div class='nick-editar'>
                                    <label>Nick</label>
                                    <input name='nick' type='text' id='nick' value='".$usuario->get_nick()."'>
                                </div>
                                </br>

                                <div class='biograia-editar'>
                                    <label>Biografia</label>
                                    <input name='biografia' type='text' id='biografia' value='".$usuario->get_biografia()."'>
                                </div>
                                </br>
                                <input type='submit' id='enviar' value='Enviar'>
                            </form>
                        </div>
                    </div>
                    </dialog>
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
                    <a href='post.php?id_post=".$post->get_id_post()."' style='text-decoration: none;'>
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

<script>
  document.addEventListener("DOMContentLoaded", function () {
    const button = document.querySelector("button");
    const modal = document.querySelector("dialog");
    const buttonClose = document.querySelector("dialog button");

    button.onclick = function () {
      modal.showModal();
    };

    buttonClose.onclick = function () {
      modal.close();
    };
  });
</script>
    </body>
</html>