<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\SeasonRepository;
use Doctrine\Common\Collections\Collection;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=SeasonRepository::class)
 * @ApiResource(
 *      normalizationContext={"groups"={"read:season"}},
 *      collectionOperations={"GET","POST"},
 *      itemOperations={"GET", "PUT", "DELETE"}
 * )
 */
class Season
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"read:season"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"read:season"})
     */
    private $SEA_name;

    /**
     * @ORM\Column(type="date", nullable=true)
     * @Groups({"read:season"})
     */
    private $SEA_date_start;

    /**
     * @ORM\Column(type="date", nullable=true)
     * @Groups({"read:season"})
     */
    private $SEA_date_end;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     * @Groups({"read:season"})
     */
    private $SEA_isArchive;

    /**
     * @ORM\Column(type="date", nullable=true)
     * @Groups({"read:season"})
     */
    private $SEA_date_edit;

    /**
     * @ORM\ManyToMany(targetEntity=Ingredient::class, inversedBy="seasons")
     * @Groups({"read:season"})
     */
    private $ingredient;

    public function __construct()
    {
        $this->ingredient = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSEAName(): ?string
    {
        return $this->SEA_name;
    }

    public function setSEAName(string $SEA_name): self
    {
        $this->SEA_name = $SEA_name;

        return $this;
    }

    public function getSEADateStart(): ?\DateTimeInterface
    {
        return $this->SEA_date_start;
    }

    public function setSEADateStart(?\DateTimeInterface $SEA_date_start): self
    {
        $this->SEA_date_start = $SEA_date_start;

        return $this;
    }

    public function getSEADateEnd(): ?\DateTimeInterface
    {
        return $this->SEA_date_end;
    }

    public function setSEADateEnd(?\DateTimeInterface $SEA_date_end): self
    {
        $this->SEA_date_end = $SEA_date_end;

        return $this;
    }

    public function getSEAIsArchive(): ?bool
    {
        return $this->SEA_isArchive;
    }

    public function setSEAIsArchive(?bool $SEA_isArchive): self
    {
        $this->SEA_isArchive = $SEA_isArchive;

        return $this;
    }

    public function getSEADateEdit(): ?\DateTimeInterface
    {
        return $this->SEA_date_edit;
    }

    public function setSEADateEdit(?\DateTimeInterface $SEA_date_edit): self
    {
        $this->SEA_date_edit = $SEA_date_edit;

        return $this;
    }

    /**
     * @return Collection|Ingredient[]
     */
    public function getIngredient(): Collection
    {
        return $this->ingredient;
    }

    public function addIngredient(Ingredient $ingredient): self
    {
        if (!$this->ingredient->contains($ingredient)) {
            $this->ingredient[] = $ingredient;
        }

        return $this;
    }

    public function removeIngredient(Ingredient $ingredient): self
    {
        $this->ingredient->removeElement($ingredient);

        return $this;
    }
}
