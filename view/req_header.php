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
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <title>Friendly - Página Incial</title>
    </head>
    <body>
        
        <?php
        if(isset($_SESSION['id_usuario'])) {
            $usuario = $dao->obter($_SESSION['id_usuario']);
            echo '
            <form action="../controller/sair.php" method="post">
                <div class="sair-usuario">
                    <input type="submit" value="Sair">
                </div>
            </form>
            <p><a href="cadastro_post.php" style="text-decoration: none;">Publicar</a></p>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalExcluirConta">Excluir Conta</button>
            ';
        }else{
            echo '
            <p><a href="login.php" style="text-decoration: none;">Entrar</a></p>
            <p><a href="cadastro_usuario.php" style="text-decoration: none;">Cadastrar</a></p>';
        }
        ?>

        <!-- Modal -->
        <div id="modalExcluirConta" class="modal" tabindex="-1">
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
                    <form action="../controller/excluir_usuario.php" method="post">
                        <div class="excluir-usuario">
                            <input type="hidden" name="id_usuario" value="<?php echo $_SESSION['id_usuario']; ?>">
                            <input type="hidden" name="excluir_conta" value="<?php echo $_SESSION['excluir'] = true; ?>">
                            <input type="submit" name="excluir_conta" value="Excluir conta" id="excluir" class="btn btn-primary">
                        </div>
                    </form>
                </div>
                </div>
            </div>
        </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    </body>
</html>
