<?php
/**
 * Created by PhpStorm.
 * User: Lorenzo
 * Date: 28/02/2018
 * Time: 13:06
 */

namespace AppBundle\Repository;
use Doctrine\ORM\EntityRepository;


class NoticiaRepository extends EntityRepository
{

    /**
     * @return @ArrayOpel[]
     */
    public function findAllOpelCorsa()
    {

        return $this->createQueryBuilder('noticias')
            ->andWhere("noticias.categoria = 'opel'")
            //->setParameter('categoria', 'opel')
            ->orderBy('noticias.id', 'DESC')
            ->getQuery()
            ->execute();
    }
}
