<?php 
session_start();
require_once('../model/PostDAO.php');
$dao = new PostDAO();
$post = $dao->obter($_POST['id_post']);
// $curtidores = array($post->get_id_curtidor());
// $curtidor = array($_SESSION['id_usuario']);
// $curtidor_stringo = implode(".", $curtidor);

if(isset($_SESSION['curtir'])){
    $dao->inserir_curtida($_POST['id_post']);
    // $array_push($curtidor, $curtidores);
    unset($_SESSION['curtir']);
    header("Location:../view/index.php");
}
?>