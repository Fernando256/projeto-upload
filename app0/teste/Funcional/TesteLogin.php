<?php 
namespace Teste\Funcional;

use \Modelo\Usuario;
use \Framework\DW3Sessao;
use \Teste\Teste;

class TesteLogin extends Teste {
    public function testeAcessar() {
        $resposta = $this->get(URL_RAIZ . 'login');
        $this->verificarContem($resposta, 'Login');
    }

    public function testeLogin() {
        (new Usuario('teste', '123','teste@teste.com'))->salvar();
        $resposta = $this->post(URL_RAIZ . 'login', [
            'password' => '123',
            'email' => 'teste@teste.com'
        ]);
        $this->verificarRedirecionar($resposta, URL_RAIZ . 'uploads');
        $this->verificar(DW3Sessao::get('usuario') != null);
    }

    public function testeLoginInvalido() {
        (new Usuario('teste1', '123', 'teste@teste.com'))->salvar();
        $resposta = $this->post(URL_RAIZ . 'login', [
            'password' => 'abc',
            'email' => 'teste@teste.com'
        ]);
        $this->verificarRedirecionar($resposta, URL_RAIZ . 'login');
        $this->verificar(DW3Sessao::get('usuario') == null);
    }

    public function testeDeslogar()
    {
        (new Usuario('teste', 'teste@teste.com', '123'))->salvar();
        $resposta = $this->post(URL_RAIZ . 'login', [
            'email' => 'teste@teste.com',
            'password' => '123'
        ]);
        $resposta = $this->delete(URL_RAIZ . 'login');
        $this->verificarRedirecionar($resposta, URL_RAIZ . 'login');
        $this->verificar(DW3Sessao::get('usuario') == null);
    }
}
