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
        'GET' => '\Controlador\AppControlador#uploads',
        'POST' => '\Controlador\UploadControlador#upload'
    ],
    '/upload/1' => [
        'GET' => '\Controlador\AppControlador#topicoUpload',
    ],
    '/upload-file' => [
        'GET' => '\Controlador\AppControlador#uploadFile',
    ],
 
];
