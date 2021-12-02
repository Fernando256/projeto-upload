<?php

$rotas = [
    '/' => [
        'GET' => '\Controlador\RaizControlador#index',
    ],
    '/login' => [
        'GET' => '\Controlador\LoginControlador#index',
        'POST' => '\Controlador\LoginControlador#armazenar',
        'DELETE' => 'Controlador\LoginControlador#destruir'
    ],
    '/cadastro' => [
        'GET' => '\Controlador\CadastroControlador#index',
        'POST' => '\Controlador\CadastroControlador#armazenar'
    ], 
    '/uploads' => [
        'GET' => '\Controlador\ListaUploadsControlador#index',
    ],
    '/uploads/meus-uploads' => [
        'GET' => '\Controlador\MeusUploadsControlador#index'
    ],
    '/upload/?' => [
        'GET' => '\Controlador\TopicoControlador#mostrar',
    ],
    '/upload/?/comentario' => [
        'POST' => '\Controlador\TopicoControlador#armazenar',       
    ],
    '/upload/?/comentario/?' => [
        'PATCH' => '\Controlador\TopicoControlador#atualizar',
        'DELETE' => '\Controlador\TopicoControlador#destruir'
    ],
    '/upload-file' => [
        'GET' => '\Controlador\UploadControlador#index',
        'POST' => '\Controlador\UploadControlador#armazenar'
    ],
];