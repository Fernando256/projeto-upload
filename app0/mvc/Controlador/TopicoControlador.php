<?php
namespace Controlador;

use \Modelo\Topico;
use \Modelo\Comentario;
use \Framework\DW3Sessao;

class TopicoControlador extends Controlador {
    public function topicoUpload($id) {
        $this->verificarLogado();
        $topico = Topico::buscarTopico($id);
        $comentarios = Comentario::buscarComentario($id);
        $idUsuarioLogado = DW3Sessao::get('usuario');
        //$teste = file('/var/www/html/web3/app0/publico/filesfiles/10.pdf');


        $this->visao('inicial/topic-page.php', [
            'topico' => $topico,
            'comentarios' => $comentarios,
            'idUsuarioLogado' => $idUsuarioLogado
        ], 'navbar.php');
    }

    public function addComentario($id) {
        $idUsuarioLogado = DW3Sessao::get('usuario');
        $comentario = new Comentario(null, $_POST['add-comment'], $idUsuarioLogado, $id);
        $comentario->salvarNovoComentario();
        $this->redirecionar(URL_RAIZ . "upload/$id");
    }

    public function editarComentario($idTopico, $idComentario) {
        Comentario::updateComentario(intval($idTopico), intval($idComentario), $_POST['edit-comment-textarea']);
        $this->redirecionar(URL_RAIZ . "upload/$idTopico");
    }

    public function deletarComentario($idTopico, $idComentario) {
        Comentario::deletarComentario($idTopico, $idComentario);
        $this->redirecionar(URL_RAIZ . "upload/$idTopico");
    }
}