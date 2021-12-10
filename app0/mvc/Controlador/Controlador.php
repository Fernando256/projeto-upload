<?php
namespace Controlador;

use \Modelo\Usuario;
use \Framework\DW3Sessao;
use \Framework\DW3Controlador;
use Modelo\ListaUploads;

abstract class Controlador extends DW3Controlador {
    protected $usuario;

    protected function verificarLogado() {
        $usuario = $this->getUsuario();
        if ($usuario == null) {
            $this->redirecionar(URL_RAIZ . 'login');
        }
    }

    protected function getUsuario() {
        if ($this->usuario == null) {
        	$usuarioId = DW3Sessao::get('usuario');
        	if ($usuarioId == null) {
        		return null;
        	}
        	$this->usuario = Usuario::buscarId($usuarioId);
        }
       return $this->usuario;
    }

    protected function calcularPaginacao($id = null) {
        $data = null;
        $pagina = array_key_exists('p', $_GET) ? intval($_GET['p']) : 1;
        $limit = 6;
        $offset = ($pagina - 1) * $limit;
        if ($id != null){
            //Verificando se existe filtro por data
            if (isset($_GET['daterange'])) 
                $data = explode(' - ' ,$_GET['daterange']);
            
            $uploads = ListaUploads::buscarTodosPorUsuario($id, $limit, $offset, $data);
            $ultimaPagina = ceil(ListaUploads::contarTodos(true, $id, $data) / $limit);
        } else {
            $busca = isset($_GET['pesquisar']) ? $_GET['pesquisar'] : '';
            $ordenacao = isset($_GET['ordenar']) ? $_GET['ordenar'] : null;
            
            $uploads = ListaUploads::buscarTodos($busca, $limit, $offset, $ordenacao);
            $ultimaPagina = ceil(ListaUploads::contarTodos() / $limit);
        }  
        return compact('pagina', 'uploads', 'ultimaPagina');
    }
}
