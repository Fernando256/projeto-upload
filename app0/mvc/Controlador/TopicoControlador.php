<?php
namespace Controlador;

use \Modelo\Topico;
use \Modelo\Comentario;
use \Framework\DW3Sessao;

class TopicoControlador extends Controlador {
    public function mostrar($id) {
        $this->verificarLogado();
        $topico = Topico::buscarTopico($id);
        $comentarios = Comentario::buscarComentarios($id);
        $idUsuarioLogado = DW3Sessao::get('usuario');

        $this->visao('inicial/topic-page.php', [
            'topico' => $topico,
            'comentarios' => $comentarios,
            'idUsuarioLogado' => $idUsuarioLogado
        ], 'navbar.php');
    }

    public function armazenar($id) {
        $idUsuarioLogado = DW3Sessao::get('usuario');
        $comentario = new Comentario($_POST['add-comment'], $idUsuarioLogado, $id);
        $comentario->salvarNovoComentario();
        $this->redirecionar(URL_RAIZ . "upload/$id");
    }

    public function atualizar($idTopico, $idComentario) {
        Comentario::updateComentario(intval($idTopico), intval($idComentario), $_POST['edit-comment-textarea']);
        $this->redirecionar(URL_RAIZ . "upload/$idTopico");
    }

    public function destruir($idTopico, $idComentario) {
        Comentario::deletarComentario($idComentario);
        $this->redirecionar(URL_RAIZ . "upload/$idTopico");
    }
}