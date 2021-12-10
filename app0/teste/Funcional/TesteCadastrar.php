<?php 
namespace Teste\Funcional;

use Framework\DW3BancoDeDados;
use \Modelo\Usuario;
use \Teste\Teste;

class TesteCadastrar extends Teste {
    public function testeAcessar() {
        $resposta = $this->get(URL_RAIZ . 'cadastro');
        $this->verificarContem($resposta, 'Cadastro');
    }

    public function testeArmazenar() {
        $resposta = $this->post(URL_RAIZ . 'cadastro', [
            'name' => 'teste',
            'email' => 'teste@teste.com',
            'password' => '123'
        ]);
        $this->verificarRedirecionar($resposta, URL_RAIZ . 'login');
        $resposta = $this->get(URL_RAIZ . 'login');
        $this->verificarContem($resposta, 'Login');
        $query = DW3BancoDeDados::query('SELECT * FROM usuarios where email = "teste@teste.com"');
        $bdUsuarios = $query->fetchAll();
        $this->verificar(count($bdUsuarios) == 1);
    }

    public function testeArmazenarDoisUsuariosComMesmoEmail() {
        (new Usuario('teste', '123', 'teste@teste.com'))->salvar();
        $resposta = $this->post(URL_RAIZ . 'cadastro', [
            'name' => 'teste',
            'email' => 'teste@teste.com',
            'password' => '123'
        ]);
        
        $this->verificarRedirecionar($resposta, URL_RAIZ . 'cadastro');
        $resposta = $this->get(URL_RAIZ . 'cadastro');
        $this->verificarContem($resposta, 'Email inválido ou já existente!');
        $query = DW3BancoDeDados::query('SELECT * FROM usuarios where email = "teste@teste.com"');
        $bdUsuarios = $query->fetchAll();
        $this->verificar(count($bdUsuarios) == 1);
        
    }
}
