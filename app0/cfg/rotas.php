<?php

$rotas = [
    '/' => [
        'GET' => '\Controlador\AppControlador#index',
        'POST' => '\Controlador\LoginControlador#login',
        'DELETE' => 'Controlador\LoginControlador#deslogar'
    ],
    '/cadastro' => [
        'GET' => '\Controlador\AppControlador#cadastro',
        'POST' => '\Controlador\CadastroControlador#cadastrar'
    ], 
    '/uploads' => [
        'GET' => '\Controlador\ListaUploadsControlador#uploads',
        
    ],
    '/uploads/meus-uploads' => [
        'GET' => '\Controlador\ListaUploadsControlador#meusUploads'
    ],
    '/upload/?' => [
        'GET' => '\Controlador\TopicoControlador#topicoUpload',
    ],
    '/upload/?/comentario' => [
        'POST' => '\Controlador\TopicoControlador#addComentario',
        
    ],
    '/upload/?/comentario/?' => [
        'PATCH' => '\Controlador\TopicoControlador#editarComentario',
        'DELETE' => '\Controlador\TopicoControlador#deletarComentario'
    ],
    '/upload-file' => [
        'GET' => '\Controlador\AppControlador#uploadFile',
        'POST' => '\Controlador\UploadControlador#upload'
    ],
];