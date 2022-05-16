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
     * @ORM\Column(type="integer")
     * @Groups({"read:step", "read:recipe"})
     */
    private $STE_order;

    /**
     * @ORM\Column(type="text", nullable=true)
     * @Groups({"read:step", "read:recipe"})
     */
    private $STE_description;

    /**
     * @ORM\Column(type="date", nullable=true)
     * @Groups({"read:step"})
     */
    private $STE_date_edit;

    /**
     * @ORM\ManyToMany(targetEntity=Recipe::class, mappedBy="steps")
     */
    private $recipes;

    public function __construct()
    {
        $this->recipes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getSTEDescription(): ?string
    {
        return $this->STE_description;
    }

    public function setSTEDescription(?string $STE_description): self
    {
        $this->STE_description = $STE_description;

        return $this;
    }

    public function getSTEDateEdit(): ?\DateTimeInterface
    {
        return $this->STE_date_edit;
    }

    public function setSTEDateEdit(?\DateTimeInterface $STE_date_edit): self
    {
        $this->STE_date_edit = $STE_date_edit;

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
}
