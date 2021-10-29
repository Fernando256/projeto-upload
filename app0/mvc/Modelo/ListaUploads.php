<?php
namespace Modelo;

use \PDO;
use \Framework\DW3BancoDeDados;

class ListaUploads extends Modelo {
    const SELECT_UPLOADS_DATA = 'SELECT * FROM uploads ORDER BY data_upload DESC LIMIT ? OFFSET ?';
    const CONTAR_TODOS = 'SELECT count(id_upload) FROM uploads';

    private $id;
    private $usuarioId;
    private $titulo;
    private $descricao;
    private $data;
    private $arquivo;

    public function __construct($id , $usuarioId, $titulo, $descricao, $data = null, $arquivo = null) {
        $this->id = $id;
        $this->usuarioId;
        $this->titulo = $titulo;
        $this->usuarioId = $usuarioId;
        $this->descricao = $descricao;
        $this->data = $data;
    }

    public function getId() {
        return $this->id;
    }

    public function getDescricao() {
        return $this->descricao;
    }

    public function getUsuarioId() {
        return $this->usuarioId;
    }

    public static function contarTodos() {
        $registros = DW3BancoDeDados::query(self::CONTAR_TODOS);
        $total = $registros->fetch();
        return intval($total[0]);
    }

    public static function buscarTodosPorData($limit = 4, $offset = 0) {
        $comando = DW3BancoDeDados::prepare(self::SELECT_UPLOADS_DATA);
        $comando->bindValue(1, $limit, PDO::PARAM_INT);
        $comando->bindValue(2, $offset, PDO::PARAM_INT);
        $comando->execute();
        $registros = $comando->fetchAll();
        foreach ($registros as $registro) {
            $objetos[] = new ListaUploads(
                $registro['id_upload'],
                $registro['id_usuario'],
                $registro['titulo'],
                $registro['descricao'],
                $registro['data_upload']
            );
        }
        return $objetos;
    }
}