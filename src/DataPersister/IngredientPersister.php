<?php

/**
 * @author Kevin Clément
 */

namespace App\DataPersister;

use DateTime;
use App\Entity\Ingredient;
use Doctrine\ORM\EntityManagerInterface;
use ApiPlatform\Core\DataPersister\DataPersisterInterface;

class IngredientPersister implements DataPersisterInterface
{

    protected $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public function supports($data): bool
    {
        return $data instanceof Ingredient;
    }

    public function persist($data)
    {
        $data->setINGDateEdit(new \DateTime());
        $this->em->persist($data);
        $this->em->flush();
    }

    public function remove($data)
    {
        $this->em->remove($data);
        $this->em->flush();
    }
}
