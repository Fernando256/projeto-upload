<?php
namespace Controlador;

use \Modelo\Upload;
use \Framework\DW3Sessao;
use Modelo\ListaUploads;

class ListaUploadsControlador extends Controlador {
    private function calcularPaginacao() {
        $pagina = array_key_exists('p', $_GET) ? intval($_GET['p']) : 1;
        $limit = 6;
        $offset = ($pagina - 1) * $limit;
        $uploads = ListaUploads::buscarTodosPorData($limit, $offset);
        $ultimaPagina = ceil(ListaUploads::contarTodos() / $limit);
        return compact('pagina', 'uploads', 'ultimaPagina');
    }
    
    public function uploads() {
        $this->verificarLogado();
        $conteudo = $this->calcularPaginacao();
        $this->visao('inicial/list-page.php', [
            'uploads' => $conteudo['uploads'],
            'pagina' => $conteudo['pagina'],
            'ultimaPagina' => $conteudo['ultimaPagina']
        ], 'navbar.php');
    }
} 