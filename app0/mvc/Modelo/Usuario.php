<?php
namespace Modelo;

use \PDO;
use \Framework\DW3BancoDeDados;

class Usuario extends Modelo {
    const INSERIR_USUARIO = 'INSERT INTO usuarios(nome, email, senha) VALUES (?, ?, ?)';
    const BUSCAR_EMAIL = 'SELECT * FROM usuarios WHERE email = ?';
    const BUSCAR_ID = 'SELECT * FROM usuarios WHERE id = ?';

    private $id;
    private $nome;
    private $email;
    private $senhaCript;
    
    public function __construct($nome = null, $senha = null, $email = null, $id = null) {
        $this->nome = $nome;
        $this->senhaCript = password_hash($senha, PASSWORD_BCRYPT);
        $this->email = $email;
        $this->id = $id;
    }

    public function getId() {
        return $this->id;
    }

    public function getNome() {
        return $this->nome;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function salvar() {
        $this->inserir();
    }

    public function inserir() {
        DW3BancoDeDados::getPdo()->beginTransaction();
        $comando = DW3BancoDeDados::prepare(self::INSERIR_USUARIO);
        $comando->bindValue(1, $this->nome, PDO::PARAM_STR);
        $comando->bindValue(2, $this->email, PDO::PARAM_STR);
        $comando->bindValue(3, $this->senhaCript, PDO::PARAM_STR);
        $comando->execute();
        $this->id = DW3BancoDeDados::getPdo()->lastInsertId();
        DW3BancoDeDados::getPdo()->commit();
    }

    public static function verificarEmailExistente($email) {
        $comando = DW3BancoDeDados::prepare(self::BUSCAR_EMAIL);
        $comando->bindValue(1, $email, PDO::PARAM_STR);
        $comando->execute();

        return $comando->fetch();
    }

    public function verificarSenha($senha) {
        return password_verify($senha, $this->senhaCript);
    }

    public static function buscarId($id) {
        $comando = DW3BancoDeDados::prepare(self::BUSCAR_ID);
        $comando->bindValue(1, $id, PDO::PARAM_INT);
        $comando->execute();
        $registro = $comando->fetch();

        return new Usuario(
            $registro['nome'],
            null,
            $registro['email'],
            $registro['id']
        );
    }

    public static function buscarEmail($email) {
       $registro = Usuario::verificarEmailExistente($email);
       $usuario = null;

       if ($registro) {
           $usuario = new Usuario (
               $registro['nome'],
               null,
               $registro['email'],
               $registro['id']
           );
           $usuario->senhaCript = $registro['senha'];
       }
       return $usuario;
    }
}