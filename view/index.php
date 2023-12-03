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
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
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
                    </div>
                    <div class="curtidas">
                        <p>' . $post->get_curtida() . '</p>
                    </div>
                    ';

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
                        </form>

                        <form method="post" action="../controller/curtir_post.php">
                            <div class="curtir-post">
                                <input type="hidden" name="id_post" value ="' . $post->get_id_post() . '">
                                <input type="hidden" name="excluir" value="' . $_SESSION['curtir'] = true . '">
                                <input type="submit" name="Curtir" value="Curtir">
                            </div>
                        </form>';

                    
                echo '
                </div>';  
                    }
                }  
            }
        ?>
    
    <!-- Modal -->
    <div class="modal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Modal body text goes here.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    </body>
</html>
