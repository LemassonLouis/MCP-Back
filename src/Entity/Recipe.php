<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\RecipeRepository;
use ApiPlatform\Core\Annotation\ApiFilter;
use Doctrine\Common\Collections\Collection;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\BooleanFilter;

/**
 * @ORM\Entity(repositoryClass=RecipeRepository::class)
 * @ApiResource(
 *      collectionOperations={"GET","POST"},
 *      itemOperations={"GET", "PUT", "DELETE"}
 * ),
 * @ApiFilter(BooleanFilter::class, properties={"REC_isTechnic"})
 */

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
    private $REC_name;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $REC_comment;

    /**
     * @ORM\Column(type="time", nullable=true)
     */
    private $REC_duration;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $REC_portion;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $REC_internal;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $REC_moment;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $REC_sellPrice;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $REC_usable;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $REC_isTechnic;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $REC_isArchive;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $REC_date_edit;

    /**
     * @ORM\ManyToMany(targetEntity=Category::class, inversedBy="recipes")
     */
    private $categories;

    /**
     * @ORM\ManyToMany(targetEntity=Material::class, inversedBy="recipes")
     */
    private $materials;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->REC_name;
    }

    public function setName(string $REC_name): self
    {
        $this->REC_name = $REC_name;

        return $this;
    }

    public function getComment(): ?string
    {
        return $this->REC_comment;
    }

    public function setComment(?string $REC_comment): self
    {
        $this->REC_comment = $REC_comment;

        return $this;
    }

    public function getDuration(): ?\DateTimeInterface
    {
        return $this->REC_duration;
    }

    public function setDuration(?\DateTimeInterface $REC_duration): self
    {
        $this->REC_duration = $REC_duration;

        return $this;
    }

    public function getPortion(): ?int
    {
        return $this->REC_portion;
    }

    public function setPortion(?int $REC_portion): self
    {
        $this->REC_portion = $REC_portion;

        return $this;
    }

    public function getInternal(): ?bool
    {
        return $this->REC_internal;
    }

    public function setInternal(?bool $REC_internal): self
    {
        $this->REC_internal = $REC_internal;

        return $this;
    }

    public function getMoment(): ?bool
    {
        return $this->REC_moment;
    }

    public function setMoment(?bool $REC_moment): self
    {
        $this->REC_moment = $REC_moment;

        return $this;
    }

    public function getSellPrice(): ?int
    {
        return $this->REC_sellPrice;
    }

    public function setSellPrice(?int $REC_sellPrice): self
    {
        $this->REC_sellPrice = $REC_sellPrice;

        return $this;
    }

    public function getUsable(): ?bool
    {
        return $this->REC_usable;
    }

    public function setUsable(?bool $REC_usable): self
    {
        $this->REC_usable = $REC_usable;

        return $this;
    }

    public function getIsTechnic(): ?bool
    {
        return $this->REC_isTechnic;
    }

    public function setIsTechnic(?bool $REC_isTechnic): self
    {
        $this->REC_isTechnic = $REC_isTechnic;

        return $this;
    }

    public function getIsArchive(): ?bool
    {
        return $this->REC_isArchive;
    }

    public function setIsArchive(?bool $REC_isArchive): self
    {
        $this->REC_isArchive = $REC_isArchive;

        return $this;
    }

    public function getDateEdit(): ?\DateTimeInterface
    {
        return $this->REC_date_edit;
    }

    public function setDateEdit(?\DateTimeInterface $REC_date_edit): self
    {
        $this->REC_date_edit = $REC_date_edit;

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
}
