<?php 
class Post{
    private $id_post;
    private $id_publicador;
    private $texto;
    private $anexo;
    private $curtida;

    function set_id_post($id_post){
        $this->id_post = $id_post;
    }

    function get_id_post(){
        return $this->id_post;
    }

    function set_id_publicador($id_publicador){
        $this->id_publicador = $id_publicador;
    }

    function get_id_publicador(){
        return $this->id_publicador;
    }

    function set_texto($texto){
        $this->texto = $texto;
    }

    function get_texto(){
        return $this->texto;
    }

    function set_anexo($anexo){
        $this->anexo = $anexo;
    }

    function get_anexo(){
        return $this->anexo;
    }

    function set_curtida($curtida){
        $this->curtida = $curtida;
    }

    function get_curtida(){
        return $this->curtida;
    }
}
?>