<?php
namespace Teste\Unitario;

use \Teste\Teste;
use \Framework\DW3BancoDeDados;
use Modelo\Usuario;

class TesteUsuario extends Teste {
    public function testeInserir() {
        $usuario = new Usuario('Teste', '1234', 'dw3@teste.com');
        $usuario->salvar();
        $query = DW3BancoDeDados::query("SELECT * FROM usuarios WHERE email = 'teste@teste.com'");
        $bdUsuario = $query->fetch();
        print_r($bdUsuario);
        // $this->verificar($bdUsuario);
        // $query = DW3BancoDeDados::query('SELECT * FROM usuarios WHERE email = dw4@teste.com');
        // $bdUsuario = $query->fetch();
        // $this->verificar(!$bdUsuario);
    }

    /*public function testeVerificarEmailExistente() {
        $usuario = new Usuario('Teste', '1234', 'dw3@teste.com');
        $usuario->salvar();
        $email = Usuario::verificarEmailExistente('dw3@teste.com');
        $this->verificar($email);
        $email = Usuario::verificarEmailExistente('dw4@teste.com');
        $this->verificar(!$email);
    }*/

    /*public function testeBuscarPorId() {
        $usuario = new Usuario('Teste', '1234', 'dw3@teste.com');
        $usuario->salvar();
        $usuarioPorId = Usuario::buscarId(8);
        $this->verificar($usuarioPorId);
        $usuarioPorId = Usuario::buscarId(12);
        $this->verificar(!$usuarioPorId);
    }*/

    /*public function testeBuscarEmail() {
        $usuario = new Usuario('Teste', '1234', 'dw3@teste.com');
        $usuario->salvar();
        $email = Usuario::buscarEmail('dw3@teste.com');
        $this->verificar($email);
        $email = Usuario::buscarEmail('dw4@teste.com');
        $this->verificar(!$email);
    }*/
}