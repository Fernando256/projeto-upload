<?php
namespace Controlador;

use \Modelo\Usuario;
use \Framework\DW3Sessao;

class RaizControlador extends Controlador {
    public function index() {
        $this->redirecionar(URL_RAIZ . 'login');
    }
}