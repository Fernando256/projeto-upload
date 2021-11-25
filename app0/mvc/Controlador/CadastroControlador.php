<?php
namespace Controlador;

use \Modelo\Usuario;
use \Framework\DW3Sessao;

class CadastroControlador extends Controlador {
    public function cadastrar() {
        $nome = $_POST['name'];
        $email = $_POST['email'];
        $senha = $_POST['password'];

        if ($nome && $email && $senha) {
            $usuario = new Usuario($nome, $senha, $email);
            if(!$usuario->verificarEmailExistente($email)) {
                $usuario->salvar();
                $this->redirecionar(URL_RAIZ);
            }
        }
        $this->redirecionar(URL_RAIZ . 'cadastro');
    }
}