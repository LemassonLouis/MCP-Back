<?php

namespace App\DataPersister;

use App\Entity\Image;
use Doctrine\ORM\EntityManagerInterface;
use ApiPlatform\Core\DataPersister\DataPersisterInterface;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;

class IngredientPersister implements DataPersisterInterface
{

    protected $em;
    protected $user;

    public function __construct(EntityManagerInterface $em, TokenStorageInterface $token)
    {
        $this->em = $em;
        $this->user = $token->getToken()->getUser();
    }

    public function supports($data): bool
    {
        return $data instanceof Image;
    }

    public function persist($data)
    {
        $data->setIMGCreatedBy($this->user)
            ->setIMGCreatedAt(new \DateTimeImmutable());
        $this->em->persist($data);
        $this->em->flush();
    }

    public function remove($data)
    {
        $this->em->remove($data);
        $this->em->flush();
    }
}
