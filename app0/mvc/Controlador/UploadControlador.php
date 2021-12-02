<?php
namespace Controlador;

use \Modelo\Upload;
use \Framework\DW3Sessao;

class UploadControlador extends Controlador {
    public function index() {
        $this->verificarLogado();
        $this->visao('inicial/upload-file.php', [], 'navbar.php');
    } 

    public function armazenar() {
        $titulo = $_POST['titulo'];
        $descricao = $_POST['descricao'];
        $arquivo = array_key_exists('upload-arquivo', $_FILES) ? $_FILES['upload-arquivo'] : null;
        $idUsuario = DW3Sessao::get('usuario');
        
        if ($titulo && $descricao && $arquivo) {
            $upload = new Upload($titulo, $descricao, $arquivo, $idUsuario);
            $upload->salvar();
            
            $this->redirecionar(URL_RAIZ . 'uploads');
        }
        $this->redirecionar(URL_RAIZ . 'upload-file');
    }
}