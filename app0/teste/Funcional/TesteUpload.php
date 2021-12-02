<?php
namespace Teste\Funcional;

use \Teste\Teste;
use \Modelo\Usuario;
use \Framework\DW3BancoDeDados;

class TesteUpload extends Teste {
    public function testeUploadDeslogado() {
        $resposta = $this->get(URL_RAIZ . 'upload-file');
        $this->verificarRedirecionar($resposta, URL_RAIZ . 'login');
    }

    public function testeArmazenarComArquivoNulo() {
        $this->logar();
        $resposta = $this->post(URL_RAIZ . 'upload-file', [
            'titulo' => 'teste',
            'descricao' => 'Descrição qualquer',
            'upload-arquivo' => null
        ]);

        $this->verificarRedirecionar($resposta, URL_RAIZ . 'upload-file');
    }
}
