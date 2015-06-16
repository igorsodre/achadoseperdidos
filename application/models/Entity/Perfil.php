<?php
/**
 * Created by PhpStorm.
 * User: Igor
 * Date: 5/27/2015
 * Time: 10:50 AM
 */
namespace Entity;
 /**
 ** @package Entity
 ** @Entity
 ** @Table(name="perfil")
 */
class Perfil
{
     /**
     ** @Id
     ** @Column(name="idperfil", type="integer", nullable=false)
     ** @GeneratedValue(strategy="AUTO")
     */
    private $id;

     /**
     ** @Column(name="login", nullable=false)
     */
    private $login;

     /**
     ** @Column(name="nome")
     */
    private $nome;

     /**
     ** @Column(name="email")
     */
    private $email;

     /**
     ** @Column(name="senha")
     */
    private $senha;

     /**
     ** @Column(name="rg")
     */
    private $rg;

     /**
     ** @Column(name="telefone")
     */
    private $telefone;

     /**
     ** @Column(name="tipo")
     */
    private $tipo;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * @param mixed $login
     */
    public function setLogin($login)
    {
        $this->login = $login;
    }

    /**
     * @return mixed
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * @param mixed $nome
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getSenha()
    {
        return $this->senha;
    }

    /**
     * @param mixed $senha
     */
    public function setSenha($senha)
    {
        $this->senha = $senha;
    }

    /**
     * @return mixed
     */
    public function getRg()
    {
        return $this->rg;
    }

    /**
     * @param mixed $rg
     */
    public function setRg($rg)
    {
        $this->rg = $rg;
    }

    /**
     * @return mixed
     */
    public function getTelefone()
    {
        return $this->telefone;
    }

    /**
     * @param mixed $telefone
     */
    public function setTelefone($telefone)
    {
        $this->telefone = $telefone;
    }

    /**
     * @return mixed
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * @param mixed $tipo
     */
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;
    }
    public static function getCaminho(){
        return 'Entity\Perfil';
    }

    public function arrayToObjeto($arr)
    {
        $this->setLogin($arr['login']);
        $this->setNome($arr['nome']);
        $this->setRg($arr['rg']);
        $this->setEmail($arr['email']);
        $this->setSenha($arr['senha']);
        $this->setTelefone($arr['telefone']);
        $this->setTipo($arr['tipo']);
    }


}
