<?php
require_once APPPATH . 'models/base_model.php';

class Objeto_Model extends Base_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function verificaRequisicao($requisicao, $objeto, $user)
    {
        return $this->em->createQueryBuilder()->select('ent')->from($requisicao, 'ent')
            ->where('ent.idObjeto=' . $objeto, 'ent.idPerfil=' . $user)
            ->getQuery()->getResult();
    }

    public function buscarObjetosRequisitados()
    {
        $id = $this->session->userdata('loginId');
        $requisicoes = $this->em->createQueryBuilder()->select('req')->from('Entity\Requisicao','req')
            ->where('req.idPerfil=' . $id)->getQuery()->getResult();
        foreach($requisicoes as $requisicao){
            $idObjeto = $requisicao->getIdObjeto()->getId();
            $objetos[] = $this->em->createQueryBuilder()->select('obj')->from('Entity\Obj','obj')
                ->where('obj.id='.$idObjeto)->getQuery()->getSingleResult();
        }
        return $objetos;
    }
}