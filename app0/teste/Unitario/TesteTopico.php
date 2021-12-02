<?php
namespace Teste\Unitario;

use \Teste\Teste;
use Modelo\Topico;

class TesteTopico extends Teste {
    public function testeBuscarTopico() {
        $topico = Topico::buscarTopico(16);
        $this->verificar($topico->getTitulo() == 'Abobrinha');
        $this->verificar($topico->getDescricao() == 'Abobrinha');
        $this->verificar($topico->getExtArquivo() == 'png');
        $this->verificar($topico->getId() == 16);
    }
}