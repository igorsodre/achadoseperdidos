<?php
/**
 * Created by PhpStorm.
 * User: Igor
 * Date: 5/27/2015
 * Time: 10:50 AM
 */

namespace Entity;
require_once APPPATH.'models/Entity/BaseEntity.php';
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * @Entity
 * @Table(name="requisicao")
 */
class Requisicao extends \BaseEntity
{
    /**
     ** @Id
     ** @Column(name="idrequisicao", type="integer", nullable=false)
     ** @GeneratedValue(strategy="AUTO")
     */
    private $id;
    /**
     * @OneToOne(targetEntity="Obj", fetch="EAGER")
     * @JoinColumn(name="objeto_idobjeto", referencedColumnName="idobjeto", nullable=false)
     */
    private $idObjeto;

    /**
     ** @OneToOne(targetEntity="Perfil", fetch="EAGER")
     ** @JoinColumn(name="perfil_idperfil", referencedColumnName="idperfil", nullable=false)
     */
    private $idPerfil;

    /**
     * @Column(name="status",nullable=false)
     */
    protected $status;

    /**
     * @return mixed
     */
    public function getReqId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getIdObjeto()
    {
        return $this->idObjeto;
    }

    /**
     * @param mixed $idObjeto
     */
    public function setIdObjeto($idObjeto)
    {
        $this->idObjeto = $idObjeto;
    }

    /**
     * @return mixed
     */
    public function getIdPerfil()
    {
        return $this->idPerfil;
    }

    /**
     * @param mixed $idPerfil
     */
    public function setIdPerfil($idPerfil)
    {
        $this->idPerfil = $idPerfil;
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

    public static function getCaminho(){
        return 'Entity\Requisicao';
    }

}