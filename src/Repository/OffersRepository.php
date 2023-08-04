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

    public function findAllQuery($category = NULL, $childCategory = NULL)
    {
        if ($category) {
            $data = $this->createQueryBuilder('c')
                ->innerJoin('c.product', 'a')
                ->andWhere('a.category = :category')
                ->setParameter('category', $category)
            ;
            if (isset($childCategory)) {
                $params = join(',', $childCategory);
                $data
                    ->orWhere("a.category IN ('$params')")
                ;
            }
        } else {
            $data = $this->createQueryBuilder('c');
        }

        if (isset($_GET['price'])) {
            $prices = explode(';', $_GET['price']);
            $data
                ->andWhere('c.price >= :priceMin')
                ->andWhere('c.price <= :priceMax')
                ->setParameter('priceMin', $prices[0])
                ->setParameter('priceMax', $prices[1])
            ;

            if (isset($_GET['seller'])) {
                $data
                    ->andWhere("c.merchant = :merchant")
                    ->setParameter('merchant', $_GET['seller'])
                ;
            }
        }

        if (!isset($_GET['sortBy'])) {
            return $data;
        } else {
            switch ($_GET['sortBy']) {
                case 'priceDec':
                    return $data->orderBy("c.price", '');
                case 'priceInc':
                    return $data->orderBy("c.price", 'DESC');
                case 'popDec':
                    return $data->orderBy('c.id', '');
                case 'popInc':
                    return $data->orderBy('c.id', 'DESC');
            }
        }
    }

}
