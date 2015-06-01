<?php

class Base_Model extends CI_Model
{
    // EntityManager responsável por fazer a interface com o BD.
    public $em;

    public function __construct()
    {
        parent::__construct();
        $this->em = $this->doctrine->em;
    }

    public function salvar($entidade)
    {
        $this->em->persist($entidade);
        $this->em->flush();
    }

    public function excluir($entidade)
    {
        $this->em->remove($entidade);
        $this->em->flush();
    }

    public function alterar($entidade)
    {
        $this->em->merge($entidade);
        $this->em->flush();
    }

    public function buscarTodos($entidade)
    {
        return $this->em->createQueryBuilder()->select('ent')->from($entidade, 'ent')->getQuery()->getResult();
    }

    public function buscarPorId($entidade, $id)
    {
        return $this->em->createQueryBuilder()
            ->select('ent')->from($entidade, 'ent')->where('ent.id = ?1')
            ->setParameter(1, $id)->getQuery()->getSingleResult();
    }
    public function buscarEntidadePorPropriedade($entidade, $prop, $valor, $like = false)
    {
        $isLike = $like ? ' like ' : '=';
        return $this->em->createQueryBuilder()->select('ent')->from($entidade, 'ent')
            ->where('ent.' . $prop . $isLike . '?1')->setParameter(1, $valor)
            ->getQuery()->getResult();
    }
    private function getEntityManager()
    {
        return $this->$em;
    }
}