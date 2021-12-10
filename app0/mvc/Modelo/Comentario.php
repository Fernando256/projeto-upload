<?php
namespace Modelo;

use \PDO;
use \Framework\DW3BancoDeDados;

class Comentario extends Modelo {
    const BUSCAR_COMENTARIOS= 'SELECT id_comentario, comentario, id_upload, id_usuario, nome FROM comentarios JOIN usuarios USING (id_usuario) WHERE id_upload = ?';
    const INSERIR_COMENTARIO= 'INSERT INTO comentarios (comentario, id_upload, id_usuario) VALUES (?, ?, ?)';
    const EDITAR_COMENTARIO= 'UPDATE comentarios SET comentario = ? WHERE id_upload = ? && id_comentario = ?';
    const DELETAR_COMENTARIO = 'DELETE FROM comentarios WHERE id_comentario = ?';

    private $id;
    private $comentario;
    private $idUsuario;
    private $idUpload;

    public function __construct($comentario, $idUsuario, $idUpload, $id = null, $nomeUsuario = null) {
        $this->id = $id;
        $this->comentario = $comentario;
        $this->idUsuario = $idUsuario;
        $this->idUpload = $idUpload;
        $this->nomeUsuario = $nomeUsuario;
    }

    public function getId() {
        return $this->id;
    }

    public function getComentario() {
        return $this->comentario;
    }

    public function getIdUsuario() {
        return $this->idUsuario;
    }

    public function getIdUpload() {
        return $this->idUpload;
    }

    public function getNomeUsuario() {
        return $this->nomeUsuario;
    }

    public static function buscarComentarios($id) {
        $comando = DW3BancoDeDados::prepare(self::BUSCAR_COMENTARIOS);
        $comando->bindValue(1, $id, PDO::PARAM_INT);
        $comando->execute();
        $registros = $comando->fetchAll();
        $objetos = null;
        foreach ($registros as $registro) {
            $objetos[] = new Comentario(
                $registro['comentario'],
                $registro['id_usuario'],
                $registro['id_upload'],
                $registro['id_comentario'],
                $registro['nome']
            );
        }
        return $objetos;
    }

    public function salvarNovoComentario() {
        $this->inserirComentario();
    }

    private function inserirComentario() {
        DW3BancoDeDados::getPdo()->beginTransaction();
        $comando = DW3BancoDeDados::prepare(self::INSERIR_COMENTARIO);
        $comando->bindValue(1, $this->comentario, PDO::PARAM_STR);
        $comando->bindValue(2, $this->idUpload, PDO::PARAM_INT);
        $comando->bindValue(3, $this->idUsuario, PDO::PARAM_INT);
        $comando->execute();
        $this->id = DW3BancoDeDados::getPdo()->lastInsertId();
        DW3BancoDeDados::getPdo()->commit();
    }

    public static function updateComentario($idUpload, $idComentario, $novoComentario) {
        $comando = DW3BancoDeDados::prepare(self::EDITAR_COMENTARIO);
        $comando->bindValue(1, $novoComentario, PDO::PARAM_STR);
        $comando->bindValue(2, $idUpload, PDO::PARAM_INT);
        $comando->bindValue(3, $idComentario, PDO::PARAM_INT);
        $comando->execute();
    }

    public static function deletarComentario($idComentario) {
        $comando = DW3BancoDeDados::prepare(self::DELETAR_COMENTARIO);
        $comando->bindValue(1, $idComentario, PDO::PARAM_INT);
        $comando->execute();
    }
}