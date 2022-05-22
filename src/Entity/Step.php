<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\StepRepository;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=StepRepository::class)
 * @ApiResource(
 *      normalizationContext={"groups"={"read:step"}},
 *      collectionOperations={"GET","POST"},
 *      itemOperations={"GET", "PUT", "DELETE"}
 * )
 */
class Step
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"read:step", "read:recipe"})
     * 
     */
    private $id;

    /**
     * @ORM\Column(type="text", nullable=true)
     * @Groups({"read:step", "read:recipe"})
     */
    private $STE_description;

    /**
     * @ORM\Column(type="integer")
     * @Groups({"read:step", "read:recipe"})
     */
    private $STE_order;

    /**
     * @ORM\ManyToMany(targetEntity=Recipe::class, mappedBy="steps")
     */
    private $recipes;

    /**
     * @ORM\Column(type="datetime_immutable")
     */
    private $STE_Created_At;

    /**
     * @ORM\Column(type="datetime_immutable", nullable=true)
     */
    private $STE_Updated_At;

    /**
     * @ORM\ManyToOne(targetEntity=User::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $STE_Created_By;

    /**
     * @ORM\ManyToOne(targetEntity=User::class)
     */
    private $STE_Updated_By;

    public function __construct()
    {
        $this->recipes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSTEDescription(): ?string
    {
        return $this->STE_description;
    }

    public function setSTEDescription(?string $STE_description): self
    {
        $this->STE_description = $STE_description;

        return $this;
    }

    public function getSTEOrder(): ?int
    {
        return $this->STE_order;
    }

    public function setSTEOrder(int $STE_order): self
    {
        $this->STE_order = $STE_order;

        return $this;
    }

    /**
     * @return Collection|Recipe[]
     */
    public function getRecipes(): Collection
    {
        return $this->recipes;
    }

    public function addRecipe(Recipe $recipe): self
    {
        if (!$this->recipes->contains($recipe)) {
            $this->recipes[] = $recipe;
            $recipe->addStep($this);
        }

        return $this;
    }

    public function removeRecipe(Recipe $recipe): self
    {
        if ($this->recipes->removeElement($recipe)) {
            $recipe->removeStep($this);
        }

        return $this;
    }

    public function getSTECreatedAt(): ?\DateTimeImmutable
    {
        return $this->STE_Created_At;
    }

    public function setSTECreatedAt(\DateTimeImmutable $STE_Created_At): self
    {
        $this->STE_Created_At = $STE_Created_At;

        return $this;
    }

    public function getSTEUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->STE_Updated_At;
    }

    public function setSTEUpdatedAt(?\DateTimeImmutable $STE_Updated_At): self
    {
        $this->STE_Updated_At = $STE_Updated_At;

        return $this;
    }

    public function getSTECreatedBy(): ?User
    {
        return $this->STE_Created_By;
    }

    public function setSTECreatedBy(?User $STE_Created_By): self
    {
        $this->STE_Created_By = $STE_Created_By;

        return $this;
    }

    public function getSTEUpdatedBy(): ?User
    {
        return $this->STE_Updated_By;
    }

    public function setSTEUpdatedBy(?User $STE_Updated_By): self
    {
        $this->STE_Updated_By = $STE_Updated_By;

        return $this;
    }
}
