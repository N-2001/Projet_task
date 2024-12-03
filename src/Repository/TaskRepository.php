<?php

namespace App\Repository;

use App\Entity\Task;
use App\Enum\Status;  // Assurez-vous d'importer l'énumération Status
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\ORM\QueryBuilder;

/**
 * @extends ServiceEntityRepository<Task>
 */
class TaskRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Task::class);
    }

    /**
     * Récupère les tâches en fonction de leur statut
     */
    public function findByStatus(Status $status): array
    {
        // Utilise le QueryBuilder pour créer une requête
        return $this->createQueryBuilder('t')
            ->andWhere('t.status = :status')
            ->setParameter('status', $status->value)  // Utilisation de la valeur de l'énumération
            ->orderBy('t.createdAt', 'DESC')  // Optionnel : trier par date de création
            ->getQuery()
            ->getResult();
    }

    /**
     * Récupère toutes les tâches créées après une certaine date
     */
    public function findTasksCreatedAfter(\DateTime $date): array
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.createdAt > :date')
            ->setParameter('date', $date)
            ->orderBy('t.createdAt', 'ASC')
            ->getQuery()
            ->getResult();
    }

    /**
     * Exemple d'une méthode de recherche générique par titre
     */
    public function findByTitle(string $title): array
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.title LIKE :title')
            ->setParameter('title', '%' . $title . '%')  // Recherche insensible à la casse
            ->orderBy('t.createdAt', 'ASC')
            ->getQuery()
            ->getResult();
    }

    /**
     * Exemple d'une méthode pour récupérer les tâches en fonction de plusieurs critères
     */
    public function findByFilters(?Status $status = null, ?\DateTime $startDate = null): array
    {
        $queryBuilder = $this->createQueryBuilder('t');

        if ($status) {
            $queryBuilder->andWhere('t.status = :status')
                         ->setParameter('status', $status->value);
        }

        if ($startDate) {
            $queryBuilder->andWhere('t.createdAt >= :startDate')
                         ->setParameter('startDate', $startDate);
        }

        return $queryBuilder->orderBy('t.createdAt', 'DESC')
                            ->getQuery()
                            ->getResult();
    }
}
