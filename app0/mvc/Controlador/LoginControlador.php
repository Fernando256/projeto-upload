<?php
namespace Controlador;

use \Modelo\Usuario;
use \Framework\DW3Sessao;

class LoginControlador extends Controlador {
    public function login() {
        $email = $_POST['email'];
        $senha = $_POST['password'];

        $usuario = Usuario::buscarEmail($email);

        if ($usuario && $usuario->verificarSenha($senha)) {
            DW3Sessao::set('usuario', $usuario->getId());
            $this->redirecionar(URL_RAIZ . 'uploads');
        }else
            ?><pre><?php print_r($usuario);?></pre><?php
    }

    public function deslogar() {
        DW3Sessao::deletar('usuario');
        $this->redirecionar(URL_RAIZ);
    }
}