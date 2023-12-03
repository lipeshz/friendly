<?php 
require_once('../bd/gerenciador_de_conexoes.php');
require_once('../model/PostDTO.php');

class PostDAO{
    private $con;

    function __construct(){
        $this->con = GerenciadorDeConexoes::obter_conexao();
    }

    function inserir($post){
        $result = $this->con->query("INSERT INTO posts (id_publicador,texto,anexo,curtida) VALUES ('" . $post->get_id_publicador() ."', '" . $post->get_texto() . "', '" . $post->get_anexo() . "', '" . $post->get_curtida() . "')");

        if($result->rowCount() > 0){
            return true;
        }else{
            return false;
        }
    }

    function excluir($id){
        $result = $this->con->query("DELETE FROM posts WHERE (id_post = '" . $id . "')");

        if($result->rowCount() > 0){
            return true;
        }else{
            return false;
        }
    }

    function obter($id){
        $result = $this->con->query("SELECT * FROM posts WHERE (id_post = '" . $id ."')");

        if($result->rowCount() > 0){
            $row = $result->fetch(PDO::FETCH_ASSOC);

            $p = new Post();
            $p->set_id_post($row['id_post']);
            $p->set_id_publicador($row['id_publicador']);
            $p->set_texto($row['texto']);
            $p->set_anexo($row['anexo']);
            $p->set_curtida($row['curtida']);
            
            return $p;
        }else{
            return false;
        }
    }

    function obter_por_palavra($busca){
        $result = $this->con->query("SELECT * FROM posts WHERE (LOWER(texto) LIKE '%" . $busca . "%')");

        if($result->rowCount() > 0){
            $row = $result->fetch(PDO::FETCH_ASSOC);

            $p = new Post();
            $p->set_id_post($row['id_post']);
            $p->set_id_publicador($row['id_publicador']);
            $p->set_texto($row['texto']);
            $p->set_anexo($row['anexo']);
            $p->set_curtida($row['curtida']);
            
            return $p;
        }else{
            return false;
        }
    }

    // function obter_por_publicador($id_publicador){
    //     $result = $this->con->query("SELECT FROM posts WHERE (id_publicador = )")
    // }

    function obter_todos(){
        $lista = [];
        $result = $this->con->query("SELECT * FROM posts");

        while($row = $result->fetch(PDO::FETCH_ASSOC)){
            $p = new Post();
            $p->set_id_post($row['id_post']);
            $p->set_id_publicador($row['id_publicador']);
            $p->set_texto($row['texto']);
            $p->set_anexo($row['anexo']);
            $p->set_curtida($row['curtida']);
            array_push($lista, $p);
        }
        return $lista;
    }

    function inserir_curtida($id){
        $result = $this->con->query("UPDATE posts SET curtida = curtida + 1 WHERE id_post = '" . $id . "'");

        if($result->rowCount() > 0){
            return false;
        }else{
            return true;
        }
    }
}
?>