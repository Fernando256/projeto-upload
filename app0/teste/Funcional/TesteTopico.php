<?php 
namespace Teste\Funcional;

use \Framework\DW3Sessao;
use Modelo\Comentario;
use \Teste\Teste;

class TesteTopico extends Teste {
    public function testeTopicoDeslogado() {
        $resposta = $this->get(URL_RAIZ . 'upload/16');
        $this->verificarRedirecionar($resposta, URL_RAIZ . 'login');
    }

    public function testeTopico() {
        $this->logar();
        $resposta = $this->get(URL_RAIZ . 'upload/16');
        $this->verificarContem($resposta, 'Abobrinha');
        $this->verificarContem($resposta, 'teste');
    }

    public function testeAddComentario() {
        $this->logar();
        $resposta = $this->post(URL_RAIZ . 'upload/16/comentario', [
            'add-comment' => 'ABC'
        ]);
        $this->verificarRedirecionar($resposta, URL_RAIZ . 'upload/16');
        $resposta = $this->get(URL_RAIZ . 'upload/16');
        $this->verificarContem($resposta, 'ABC');
    }

    public function testeDeleteComentario() {
        $this->logar();
        $idUsuarioLogado = DW3Sessao::get('usuario');
        (new Comentario('ABC2', $idUsuarioLogado, 16))->salvarNovoComentario();
        $resposta = $this->get(URL_RAIZ . 'upload/16');
        $this->verificarContem($resposta, 'ABC2');
        $resposta = $this->delete(URL_RAIZ . 'upload/16/comentario/1');
        $this->verificarNaoContem($resposta, 'ABC2');
    }

    public function testeUpdateComentario() {
        $this->logar();
        $idUsuarioLogado = DW3Sessao::get('usuario');
        (new Comentario('ABC', $idUsuarioLogado, 16))->salvarNovoComentario();
        $resposta = $this->get(URL_RAIZ . 'upload/16');
        $this->verificarContem($resposta, 'ABC');
        $this->patch(URL_RAIZ . 'upload/16/comentario/1', [
            'edit-comment-textarea' => 'ABC2'
        ]);
        $resposta = $this->get(URL_RAIZ . 'upload/16');
        $this->verificarContem($resposta, 'ABC2');
    }   
}