<?php 
namespace Teste\Funcional;

use Framework\DW3BancoDeDados;
use \Modelo\Usuario;
use \Framework\DW3Sessao;
use \Teste\Teste;

class TesteListagem extends Teste {
    public function testeListagemDeslogado() {
        $resposta = $this->get(URL_RAIZ . 'uploads');
        $this->verificarRedirecionar($resposta, URL_RAIZ . 'login');
    }

    public function testeListagem() {
        $this->logar();
        $resposta = $this->get(URL_RAIZ . 'uploads', [
            'ordenar' => 'ordenacao',
            'pesquisar' => ''
        ]);
        $this->verificarContem($resposta, 'Pesquisar e ordenar:');
        $this->verificarContem($resposta, '<div class="upload-block">');
    }

    public function testeListagemMeuUsuarioVazio() {
        $this->logar();
        $resposta = $this->get(URL_RAIZ . 'uploads/meus-uploads');
        $this->verificarContem($resposta, 'Filtrar:');
        $this->verificarNaoContem($resposta, '<div class="upload-block">');
    }
}