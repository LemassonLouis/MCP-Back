<?php

/**
 * @author Kevin Clément
 */

namespace App\DataPersister;

use DateTime;
use App\Entity\Recipe;
use Doctrine\ORM\EntityManagerInterface;
use ApiPlatform\Core\DataPersister\DataPersisterInterface;

class RecipePersister implements DataPersisterInterface
{

    protected $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public function supports($data): bool
    {
        return $data instanceof Recipe;
    }

    public function persist($data)
    {
        $data->setDateEdit(new \DateTime());
        $this->em->persist($data);
        $this->em->flush();
    }

    public function remove($data)
    {
        $this->em->remove($data);
        $this->em->flush();
    }
}
