<?php
namespace Modelo;

use \PDO;
use \Framework\DW3BancoDeDados;
use \Framework\DW3ImagemUpload;


class Upload extends Modelo {
    const INSERIR_UPLOAD = "INSERT INTO uploads (titulo, descricao, ext_arquivo, id_usuario) VALUES (?, ?, ? ,?)";

    private $id;
    private $titulo;
    private $descricao;
    private $arquivo;
    private $idUsuario;

    public function __construct($titulo, $descricao, $arquivo, $idUsuario, $id = null) {
        $this->titulo = $titulo;
        $this->descricao = $descricao;
        $this->arquivo = $arquivo;
        $this->idUsuario = $idUsuario;
        $this->id = $id;
    }

    public function setTitulo($titulo) {
        $this->titulo = $titulo;
    }

    public function getTitulo() {
        return $this->titulo;
    }

    public function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

    public function getDescricao() {
        return $this->descricao;
    }

    public function getArquivo() {
        return $this->arquivo;
    }

    public function getId() {
        return $this->id;
    }

    public function salvar() {
        $this->inserir();
        $this->salvarArquivo();
    }

    private function salvarArquivo() {
        if ($this->arquivo) {
            $ext = pathinfo($this->arquivo['name'], PATHINFO_EXTENSION);
            $caminho = PASTA_PUBLICO . "files/{$this->id}.$ext";
            DW3ImagemUpload::salvar($this->arquivo, $caminho); 
        } 
    }

    public function inserir() {
        DW3BancoDeDados::getPdo()->beginTransaction();
        $comando = DW3BancoDeDados::prepare(self::INSERIR_UPLOAD);
        $comando->bindValue(1, $this->titulo, PDO::PARAM_STR);
        $comando->bindValue(2, $this->descricao, PDO::PARAM_STR);
        $comando->bindValue(3, pathinfo($this->arquivo["name"], PATHINFO_EXTENSION), PDO::PARAM_STR);
        $comando->bindValue(4, $this->idUsuario, PDO::PARAM_STR);
        $comando->execute();
        $this->id = DW3BancoDeDados::getPdo()->lastInsertId();
        DW3BancoDeDados::getPdo()->commit();
    }
}