<?php
namespace Controlador;

use \Modelo\Usuario;
use \Framework\DW3Sessao;

class LoginControlador extends Controlador {
    public function index() {
        $this->visao('inicial/index.php');
    }
    
    public function login() {
        $email = $_POST['email'];
        $senha = $_POST['password'];

        $usuario = Usuario::buscarEmail($email);

        if ($email && $senha) {
            if ($usuario && $usuario->verificarSenha($senha)) {
                DW3Sessao::set('usuario', $usuario->getId());
                $this->redirecionar(URL_RAIZ . 'uploads');
            }     
        }   
        $this->redirecionar(URL_RAIZ . 'login');     
    }

    public function deslogar() {
        DW3Sessao::deletar('usuario');
        $this->redirecionar(URL_RAIZ . 'login');
    }
}