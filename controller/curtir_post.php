<?php 
session_start();
require_once('../model/PostDAO.php');

$dao = new PostDAO();
$post = $dao->obter($_POST['id_post']);

if(isset($_SESSION['curtir']) && $dao->inserir_curtida($_POST['id_post'])){
    echo "Curtida inserida com sucesso!";
}
?>