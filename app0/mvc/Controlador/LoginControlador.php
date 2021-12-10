<?php
namespace Controlador;

use \Modelo\Usuario;
use \Framework\DW3Sessao;

class LoginControlador extends Controlador {
    public function index() {
        $this->visao('inicial/index.php', [
            'mensagem' => DW3Sessao::getFlash('mensagem', null)
        ]);
    }
    
    public function armazenar() {
        $email = $_POST['email'];
        $senha = $_POST['password'];

        $usuario = Usuario::buscarEmail($email);

        if ($email && $senha) {
            if ($usuario && $usuario->verificarSenha($senha)) {
                DW3Sessao::set('usuario', $usuario->getId());
                $this->redirecionar(URL_RAIZ . 'uploads');
            }     
        }
        DW3Sessao::setFlash('mensagem', 'Dados inseridos são inválidos!');  
        $this->redirecionar(URL_RAIZ . 'login');     
    }

    public function destruir() {
        DW3Sessao::deletar('usuario');
        $this->redirecionar(URL_RAIZ . 'login');
    }
}