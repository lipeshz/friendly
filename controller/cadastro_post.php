<?php 
session_start();
require_once('../model/PostDAO.php');
require_once('../model/UsuarioDAO.php');

if(empty($_POST['texto'])){
    $_SESSION['cad_texto_err'] = true;
    header("Location:../view/cadastro_post.php");
}else{
    $dao_p = new PostDAO();
    $dao_u = new UsuarioDAO();
    $post = new Post();
    $usuario = $dao_u->obter($_SESSION['id_usuario']);

    $id_pub = $usuario->get_id_usuario();
    $post->set_texto($_POST['texto']);
    $post->set_id_publicador($id_pub);
    
    // if(isset($_POST['anexo'])){
    //     $array_type = explode('/', $_FILES['img_princ']['type']);
    //     $exetension = end($array_type);

    //     $nome = time().random_string(24);
    //     $nome_img = $nome.".".$exetension;
    //     $_FILES['img_princ']['nome'] = $nome_img;
    //     $uploaddir = 'C:/XAMPP/xampp/htdocs/Friendly/img/';
    //     $uploadfile = $uploaddir.$_FILES['img_princ']['name'];
    //     move_uploaded_file($_FILES['img_princ']['tmp_name'], $uploadfile);

    //     $post->set_anexo($nome_img);
    // }
    
    if($dao_p->inserir($post)){
        $post = $post->get_id_post();
        header("Location:../view/index.php");
    }else{
        header("Location:../view/cadastro.php");
    }
}
?>
