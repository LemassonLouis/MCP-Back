<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\MaterialRepository;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=MaterialRepository::class)
 * @ApiResource(
 *      normalizationContext={"groups"={"read:material"}},
 * )
 */
class Material
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"read:material"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=128)
     * @Groups({"read:material"})
     */
    private $MAT_name;

    /**
     * @ORM\Column(type="boolean")
     * @Groups({"read:material"})
     */
    private $MAT_isArchive;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMATName(): ?string
    {
        return $this->MAT_name;
    }

    public function setMATName(string $MAT_name): self
    {
        $this->MAT_name = $MAT_name;

        return $this;
    }

    public function getMATIsArchive(): ?bool
    {
        return $this->MAT_isArchive;
    }

    public function setMATIsArchive(bool $MAT_isArchive): self
    {
        $this->MAT_isArchive = $MAT_isArchive;

        return $this;
    }
}
