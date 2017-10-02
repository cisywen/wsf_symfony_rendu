<?php
namespace App\Repository;

use Doctrine\ORM\EntityRepository;

class ProductRepository extends EntityRepository
{
    public function findAllOrderedById()
    {
        return $this->getEntityManager()
            ->createQuery(
                'SELECT product FROM App:Product product ORDER BY product.id DESC '
            )
            ->setMaxResults(5)
            ->setFirstResult(0)
            ->getResult();
    }
}

