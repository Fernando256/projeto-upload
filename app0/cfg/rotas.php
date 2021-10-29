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
        'POST' => '\Controlador\UploadControlador#upload'
    ],
    '/upload/?' => [
        'GET' => '\Controlador\TopicoControlador#topicoUpload',
    ],
    '/upload-file' => [
        'GET' => '\Controlador\AppControlador#uploadFile',
    ],
 
];
