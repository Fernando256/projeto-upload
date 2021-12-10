<?php
namespace Teste\Unitario;

use \Teste\Teste;
use \Modelo\Comentario;
use \Framework\DW3BancoDeDados;

class TesteComentario extends Teste {
    public function testeArmazenar() {
        $comentario = new Comentario('ABC', 4, 16);
        $comentario->salvarNovoComentario();
        $query = DW3BancoDeDados::query('SELECT * FROM comentarios');
        $bdComentario = $query->fetch();
        $this->verificar($bdComentario['comentario'] === $comentario->getComentario());
    }

    public function testeAtualizar() {
        $comentario = new Comentario('ABC', 4, 16);
        $comentario->salvarNovoComentario();
        Comentario::updateComentario(16, 1, 'TESTE');
        $query = DW3BancoDeDados::query('SELECT * FROM comentarios');
        $registro = $query->fetch();
        $this->verificar($registro['comentario'] === 'TESTE');
    }

    public function testeDestruir() {
        $comentario = new Comentario('ABC', 4, 16);
        $comentario->salvarNovoComentario();
        Comentario::deletarComentario(16, $comentario->getId());
    }

    public function testeBuscarTodosPorTopico() {
        (new Comentario('ABC', 4, 16))->salvarNovoComentario();
        (new Comentario('Teste', 4, 16))->salvarNovoComentario();
        (new Comentario('Jonas', 4, 16))->salvarNovoComentario();
        $comentarios = Comentario::buscarComentarios(16);
        $this->verificar(count($comentarios) == 3);
    }
}