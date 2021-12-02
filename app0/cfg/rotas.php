<?php

$rotas = [
    '/' => [
        'GET' => '\Controlador\RaizControlador#index',
    ],
    '/login' => [
        'GET' => '\Controlador\LoginControlador#index',
        'POST' => '\Controlador\LoginControlador#login',
        'DELETE' => 'Controlador\LoginControlador#deslogar'
    ],
    '/cadastro' => [
        'GET' => '\Controlador\CadastroControlador#index',
        'POST' => '\Controlador\CadastroControlador#cadastrar'
    ], 
    '/uploads' => [
        'GET' => '\Controlador\ListaUploadsControlador#index',
        
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
        'GET' => '\Controlador\UploadControlador#index',
        'POST' => '\Controlador\UploadControlador#upload'
    ],
];