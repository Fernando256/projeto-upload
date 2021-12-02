<?php
namespace Controlador;

use \Framework\DW3Sessao;

class MeusUploadsControlador extends Controlador {
    public function index() {
        $this->verificarLogado();
        $idUsuario = DW3Sessao::get('usuario');
        $conteudo = $this->calcularPaginacao($idUsuario);
        
        $this->visao('inicial/my-upload.php', [
            'uploads' => $conteudo['uploads'],
            'pagina' => $conteudo['pagina'],
            'idUsuario' => $idUsuario,
            'ultimaPagina' => $conteudo['ultimaPagina']
        ], 'navbar.php');
    }
}