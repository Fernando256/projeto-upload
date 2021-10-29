<?php
namespace Controlador;

use \Modelo\Topico;
use \Framework\DW3Sessao;

class TopicoControlador extends Controlador {
    public function topicoUpload($id) {
        $this->verificarLogado();
        $topico = Topico::buscarTopico($id);


        $teste = file('/var/www/html/web3/app0/publico/filesfiles/10.pdf');

        print_r($teste);

        $this->visao('inicial/topic-page.php', [
            'topico' => $topico,
            'download' => $teste
        ], 'navbar.php');
    }
}