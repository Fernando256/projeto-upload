<?php
namespace Controlador;

use \Modelo\Upload;
use \Framework\DW3Sessao;

class ListaUploadsControlador extends Controlador {
    public function index() {
        $this->verificarLogado();
        $conteudo = $this->calcularPaginacao();
        $idUsuario = DW3Sessao::get('usuario');
        $this->visao('inicial/list-page.php', [
            'uploads' => $conteudo['uploads'],
            'pagina' => $conteudo['pagina'],
            'idUsuario' => $idUsuario,
            'ultimaPagina' => $conteudo['ultimaPagina']
        ], 'navbar.php');
    }

    public function meusUploads() {
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