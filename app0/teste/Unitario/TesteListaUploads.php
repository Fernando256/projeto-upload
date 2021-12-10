<?php
namespace Teste\Unitario;

use \Teste\Teste;
use \Modelo\ListaUploads;

class TesteListaUploads extends Teste {
    public function testeContarTodos() {
        $uploads = ListaUploads::contarTodos();
        $this->verificar($uploads == 7);
    }

    public function testeBuscarTodos() {
        $uploads = ListaUploads::buscarTodos('', 9999);
        $this->verificar(count($uploads) == 7);
    }

    public function testeBuscarTodosPorUsuario() {
        $uploads = ListaUploads::buscarTodosPorUsuario(4, 9999, 0);
        $this->verificar(count($uploads) == 7);
        $uploads = ListaUploads::buscarTodosPorUsuario(7, 9999, 0);
        $this->verificar(count($uploads) == 0);
    }
}