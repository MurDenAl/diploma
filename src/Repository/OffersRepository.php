<?php

namespace App\Repository;

use App\Entity\Offers;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\DBAL\Query\QueryBuilder;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Offers>
 *
 * @method Offers|null find($id, $lockMode = null, $lockVersion = null)
 * @method Offers|null findOneBy(array $criteria, array $orderBy = null)
 * @method Offers[]    findAll()
 * @method Offers[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OffersRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Offers::class);
    }

//    /**
//     * @return Offers[] Returns an array of Offers objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('o')
//            ->andWhere('o.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('o.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Offers
//    {
//        return $this->createQueryBuilder('o')
//            ->andWhere('o.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }

    public function createData(): \Doctrine\ORM\QueryBuilder
    {
        $data = $this->createQueryBuilder('c');

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        //    $prices = explode(';', $_POST['price']);

            $data
                ->andWhere('c.price >= 30')
        //        ->andWhere('c.price >= :priceMin' and 'c.price <= :priceMax')
        //        ->setParameter('priceMin', "")
        //        ->setParameter('priceMax', "")
            ;
        }
        return $data;
    }

    public function findAllQuery(\Doctrine\ORM\QueryBuilder $data = NULL)
    {
        //$data = $this->createQueryBuilder('c');

        //if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        //    $prices = explode(';', $_POST['price']);

        //    $data
        //    ->andWhere('c.price >= 30')
        //        ->andWhere('c.price >= :priceMin' and 'c.price <= :priceMax')
        //        ->setParameter('priceMin', "")
        //        ->setParameter('priceMax', "")
        //    ;
        //}

        if ($data == NULL) {
            $data = $this->createQueryBuilder('c');
        }

        if (!isset($_GET['sortBy'])) {
            return $data;
        } else {
            switch ($_GET['sortBy']) {
                case 'priceDec':
                    return $data->orderBy("c.price", '');
                case 'priceInc':
                    return $data->orderBy("c.price", 'DESC');
            }
        }
    }

}
