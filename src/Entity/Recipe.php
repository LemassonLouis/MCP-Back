<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\RecipeRepository;
use ApiPlatform\Core\Annotation\ApiResource;

/**
 * @ORM\Entity(repositoryClass=RecipeRepository::class)
 */
#[ApiResource]
class Recipe
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $name;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $comment;

    /**
     * @ORM\Column(type="time", nullable=true)
     */
    private $duration;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $portion;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $internal;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $moment;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $sellPrice;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $usable;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $isTechnic;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $isArchive;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $date_edit;

    /**
     * @ORM\ManyToMany(targetEntity=Category::class, inversedBy="recipes")
     */
    private $categories;

    /**
     * @ORM\ManyToMany(targetEntity=Material::class, inversedBy="recipes")
     */
    private $materials;

    /**
     * @ORM\OneToMany(targetEntity=Image::class, mappedBy="recipe")
     */
    private $images;

    public function __construct()
    {
        $this->categories = new ArrayCollection();
        $this->materials = new ArrayCollection();
        $this->images = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getComment(): ?string
    {
        return $this->comment;
    }

    public function setComment(?string $comment): self
    {
        $this->comment = $comment;

        return $this;
    }

    public function getDuration(): ?\DateTimeInterface
    {
        return $this->duration;
    }

    public function setDuration(?\DateTimeInterface $duration): self
    {
        $this->duration = $duration;

        return $this;
    }

    public function getPortion(): ?int
    {
        return $this->portion;
    }

    public function setPortion(?int $portion): self
    {
        $this->portion = $portion;

        return $this;
    }

    public function getInternal(): ?bool
    {
        return $this->internal;
    }

    public function setInternal(?bool $internal): self
    {
        $this->internal = $internal;

        return $this;
    }

    public function getMoment(): ?bool
    {
        return $this->moment;
    }

    public function setMoment(?bool $moment): self
    {
        $this->moment = $moment;

        return $this;
    }

    public function getSellPrice(): ?int
    {
        return $this->sellPrice;
    }

    public function setSellPrice(?int $sellPrice): self
    {
        $this->sellPrice = $sellPrice;

        return $this;
    }

    public function getUsable(): ?bool
    {
        return $this->usable;
    }

    public function setUsable(?bool $usable): self
    {
        $this->usable = $usable;

        return $this;
    }

    public function getIsTechnic(): ?bool
    {
        return $this->isTechnic;
    }

    public function setIsTechnic(?bool $isTechnic): self
    {
        $this->isTechnic = $isTechnic;

        return $this;
    }

    public function getIsArchive(): ?bool
    {
        return $this->isArchive;
    }

    public function setIsArchive(?bool $isArchive): self
    {
        $this->isArchive = $isArchive;

        return $this;
    }

    public function getDateEdit(): ?\DateTimeInterface
    {
        return $this->date_edit;
    }

    public function setDateEdit(?\DateTimeInterface $date_edit): self
    {
        $this->date_edit = $date_edit;

        return $this;
    }

    /**
     * @return Collection|Category[]
     */
    public function getCategories(): Collection
    {
        return $this->categories;
    }

    public function addCategory(Category $category): self
    {
        if (!$this->categories->contains($category)) {
            $this->categories[] = $category;
        }

        return $this;
    }

    public function removeCategory(Category $category): self
    {
        $this->categories->removeElement($category);

        return $this;
    }

    /**
     * @return Collection|Material[]
     */
    public function getMaterials(): Collection
    {
        return $this->materials;
    }

    public function addMaterial(Material $material): self
    {
        if (!$this->materials->contains($material)) {
            $this->materials[] = $material;
        }

        return $this;
    }

    public function removeMaterial(Material $material): self
    {
        $this->materials->removeElement($material);

        return $this;
    }

    /**
     * @return Collection|Image[]
     */
    public function getImages(): Collection
    {
        return $this->images;
    }

    public function addImage(Image $image): self
    {
        if (!$this->images->contains($image)) {
            $this->images[] = $image;
            $image->setRecipe($this);
        }

        return $this;
    }

    public function removeImage(Image $image): self
    {
        if ($this->images->removeElement($image)) {
            // set the owning side to null (unless already changed)
            if ($image->getRecipe() === $this) {
                $image->setRecipe(null);
            }
        }

        return $this;
    }
}
