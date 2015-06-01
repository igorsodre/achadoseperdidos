<?php
/**
 * Created by PhpStorm.
 * User: Igor
 * Date: 5/29/2015
 * Time: 10:57 AM
 */

namespace Entity;

/**
 ** @Entity
 ** @Table(name="objeto")
 */
class Obj {
    /**
     ** @Id
     ** @Column(name="idobjeto", type="integer", nullable=false)
     ** @GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     ** @Column(name="identificacao")
     */
    private $identificacao;

    /**
     ** @Column(name="descricao")
     */
    private $descricao;

    /**
     ** @Column(name="data")
     */
    private $data;

    /**
     ** @Column(name="foto")
     */
    private $foto;

    /**
     ** @Column(name="status")
     */
    private $status;

    /**
     ** @OneToOne(targetEntity="Perfil")
     ** @JoinColumn(name="perfil_idperfil", referencedColumnName="idperfil", nullable=false)
     */
    private $perfil;

    /**
     ** @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getIdentificacao()
    {
        return $this->identificacao;
    }

    /**
     * @param mixed $identificao
     */
    public function setIdentificacao($identificao)
    {
        $this->identificacao = $identificao;
    }

    /**
     * @return mixed
     */
    public function getDescricao()
    {
        return $this->descricao;
    }

    /**
     * @param mixed $descricao
     */
    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;
    }

    /**
     * @return mixed
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param mixed $data
     */
    public function setData($data)
    {
        $this->data = $data;
    }

    /**
     * @return mixed
     */
    public function getFoto()
    {
        return $this->foto;
    }

    /**
     * @param mixed $foto
     */
    public function setFoto($foto)
    {
        $this->foto = $foto;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * @return mixed
     */
    public function getPerfil()
    {
        return $this->perfil;
    }

    /**
     * @param $perfil
     * @internal param mixed $idPerfil
     */
    public function setPerfil($perfil)
    {
        $this->perfil = $perfil;
    }

    public static function getCaminho(){
        return 'Entity\Obj';
    }

    public function arrayToObjeto($arr){
        $this->setIdentificacao($arr['identificacao']);
        $this->setDescricao($arr['descricao']);
        $this->setData($arr['data']);
        $this->setFoto($arr['foto']);
        $this->setStatus($arr['status']);
        $this->setPerfil($arr['idperfil']);
    }
}