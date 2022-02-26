<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\MaterialRepository;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=MaterialRepository::class)
 * @ApiResource(
 *      normalizationContext={"groups"={"read:material"}},
 *      collectionOperations={"GET","POST"},
 *      itemOperations={"GET", "PUT", "DELETE"}
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

    /**
     * @ORM\OneToOne(targetEntity=Image::class, inversedBy="material", cascade={"persist", "remove"})
     */
    private $image;

    /**
     * @ORM\ManyToMany(targetEntity=Recipe::class, mappedBy="materials")
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

    public function getImage(): ?Image
    {
        return $this->image;
    }

    public function setImage(?Image $image): self
    {
        $this->image = $image;

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
            $recipe->addMaterial($this);
        }

        return $this;
    }

    public function removeRecipe(Recipe $recipe): self
    {
        if ($this->recipes->removeElement($recipe)) {
            $recipe->removeMaterial($this);
        }

        return $this;
    }
}
