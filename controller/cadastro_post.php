<?php 
session_start();
require_once('../model/PostDAO.php');
require_once('../model/UsuarioDAO.php');

function random_string($length) {
    $str = random_bytes($length);
    $str = base64_encode($str);
    $str = str_replace(["+", "/", "="], "", $str);
    $str = substr($str, 0, $length);
    return $str;
}

if(empty($_POST['texto']) && empty($_POST['anexo'])){
    $_SESSION['cad_texto_err'] = true;
    header("Location:../view/cadastro_post.php");
}else{
    $dao_p = new PostDAO();
    $dao_u = new UsuarioDAO();
    $post = new Post();
    $usuario = $dao_u->obter($_SESSION['id_usuario']);

    $post->set_texto($_POST['texto']);
    $post->set_id_publicador($_SESSION['id_usuario']);
    
    if(isset($_POST['anexo'])){
        $array_type = explode('/', $_FILES['anexo']['type']);
        $extension = end($array_type);

        $nome_arquivo = time().random_string(24);
        $nome_img = $nome_arquivo.".".$extension;
        $_FILES['anexo']['name'] = $nome_img;
        $uploaddir = '../img/';
        $uploadfile = $uploaddir.$_FILES['anexo']['name'];
        move_uploaded_file($_FILES['anexo']['tmp_name'], $uploadfile);
        // $nome_arquivo = $_FILES['anexo']['name'];
        // $tmp_name = $_FILES['anexo']['tmp_name'];
        // $diretorio = "../img/";
        // $moved = move_uploaded_file($tmp_name, $diretorio.$nome_arquivo);

        $post->set_anexo($moved);
    }
    
    if($dao_p->inserir($post)){
        $post = $post->get_id_post();
        header("Location:../view/index.php");
    }else{
        header("Location:../view/cadastro.php");
    }
}
?>
