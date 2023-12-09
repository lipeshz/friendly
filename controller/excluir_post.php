<?php 
session_start();
require_once('../model/PostDAO.php');
$dao = new PostDAO();
$post = $dao->obter($_POST['id_post']);

$_SESSION['excluir']=true;
if(isset($_SESSION['excluir'])){
    $dao->excluir($_POST['id_post']);
    header("Location:../view/index.php");
    unset($_SESSION['excluir']);
}
?>