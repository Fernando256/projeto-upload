<?php
namespace Modelo;

use \PDO;
use \Framework\DW3BancoDeDados;

class ListaUploads extends Modelo {
    const SELECT_UPLOADS = "SELECT * FROM uploads WHERE descricao LIKE '%' ? '%' ORDER BY :order LIMIT ? OFFSET ?";
    const CONTAR_TODOS = 'SELECT count(id_upload) FROM uploads';
    const SELECT_POR_USUARIO = 'SELECT * FROM uploads WHERE id_usuario = ? ORDER BY descricao LIMIT ? OFFSET ?';
    const CONTAR_TODOS_POR_USUARIO = 'SELECT count(id_upload) FROM uploads where id_usuario = ?';
    const CONTAR_TODOS_POR_USUARIO_PERIODO = 'SELECT count(id_upload) FROM uploads where id_usuario = ? AND data_upload >= ? AND data_upload <= ?';
    const SELECT_POR_USUARIO_PERIODO = 'SELECT * FROM uploads WHERE id_usuario = ? AND data_upload >= ? AND data_upload <= ? ORDER BY descricao LIMIT ? OFFSET ?' ;

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

    public static function contarTodos($usuario = false, $id = null, $data = false) {

        //Verificar se é listagem de todos ou unico usuario
        if (!$usuario)
            $registros = DW3BancoDeDados::query(self::CONTAR_TODOS);
        else {
            $data = self::validarData($data);
            if ($data) 
                return self::contarPorPeriodo($id, $data);
            
            return self::contarPorUsuario($id); 
        }

        $total = $registros->fetch();
        return intval($total[0]);
    }

    private static function contarPorUsuario($id) {
        $comando = DW3BancoDeDados::prepare(self::CONTAR_TODOS_POR_USUARIO);
        $comando->bindValue(1, $id, PDO::PARAM_INT);
        $comando->execute();
        $registros = $comando->fetch();
        return intval($registros[0]);
    }

    public static function buscarTodos($busca = '', $limit = 6, $offset = 0, $ordenacao = null) {
        $sql = str_replace(':order', self::ordenarUploads($ordenacao), self::SELECT_UPLOADS);
        $comando = DW3BancoDeDados::prepare($sql);
        $comando->bindValue(1, $busca, PDO::PARAM_STR);
        $comando->bindValue(2, $limit, PDO::PARAM_INT);
        $comando->bindValue(3, $offset, PDO::PARAM_INT);

        $comando->execute();       

        $registros = $comando->fetchAll();

        return self::fazerALista($registros);
    }

    public static function buscarTodosPorUsuario($id, $limit = 6, $offset = 0, $data = false) {
        $data = self::validarData($data);
        if ($data) 
            $registros = self::buscarPorPeriodo($id, $data, $limit, $offset);
        else 
            $registros = self::buscarPorUsuario($id, $limit, $offset);
        
        return self::fazerALista($registros);
    }

    private static function validarData($data) {
        if ($data) {
            //Fazendo validação da data
            $v0 = explode('/' , $data[0]);
            $v1 = explode('/' , $data[1]);
            if (checkdate($v0[0], $v0[1], $v0[2]) && checkdate($v1[0], $v1[1], $v1[2])) {
                $data[0] = strtotime($data[0]);
                $data[1] = strtotime($data[1]);
                $data[0] = date("Y-m-d", $data[0]);
                $data[1] = date("Y-m-d", $data[1]) . ' 23:59:59';
                return $data;
            }
        }       
        return false;
    }

    private static function ordenarUploads($ordenacao) {
        //Atribui a ordenacao correta a variavel
        switch ($ordenacao) {
            case 'ordenacao':
                return 'descricao ASC';
            default:
                return 'data_upload DESC';
        }
    }

    private static function fazerALista($registros) {
        $objetos = array();

        if ($registros) {
            foreach ($registros as $registro) {
                $objetos[] = new ListaUploads(
                    $registro['id_upload'],
                    $registro['id_usuario'],
                    $registro['titulo'],
                    $registro['descricao'],
                    $registro['data_upload']
                );
            }
        }
        return $objetos;
    }

    private static function contarPorPeriodo($id, $data) {
        $comando = DW3BancoDeDados::prepare(self::CONTAR_TODOS_POR_USUARIO_PERIODO);
        $comando->bindValue(1, $id, PDO::PARAM_INT);
        $comando->bindValue(2, $data[0], PDO::PARAM_STR);
        $comando->bindValue(3, $data[1], PDO::PARAM_STR);
        $comando->execute();
        $registros = $comando->fetch();
        return intval($registros[0]);
    }

    private static function buscarPorUsuario($id, $limit, $offset) {
        $comando = DW3BancoDeDados::prepare(self::SELECT_POR_USUARIO);
        $comando->bindValue(1, $id, PDO::PARAM_INT);
        $comando->bindValue(2, $limit, PDO::PARAM_INT);
        $comando->bindValue(3, $offset, PDO::PARAM_INT);
        $comando->execute();
        return $comando->fetchAll();
    }

    private static function buscarPorPeriodo($id, $data, $limit, $offset) {
        $comando = DW3BancoDeDados::prepare(self::SELECT_POR_USUARIO_PERIODO);
        $comando->bindValue(1, $id, PDO::PARAM_INT);
        $comando->bindValue(2, $data[0], PDO::PARAM_STR);
        $comando->bindValue(3, $data[1], PDO::PARAM_STR);
        $comando->bindValue(4, $limit, PDO::PARAM_INT);
        $comando->bindValue(5, $offset, PDO::PARAM_INT);
        $comando->execute();

        return $comando->fetchAll();
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
}