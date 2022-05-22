<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\RecipeRepository;
use ApiPlatform\Core\Annotation\ApiFilter;
use Doctrine\Common\Collections\Collection;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Serializer\Annotation\Groups;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\BooleanFilter;

/**
 * @ORM\Entity(repositoryClass=RecipeRepository::class)
 * @ApiResource(
 *      attributes={
 *          "order"={"name": "ASC"}
 *      },
 *      normalizationContext={"groups"={"read:recipe"}},
 *      collectionOperations={"GET","POST"},
 *      itemOperations={"GET", "PUT", "DELETE"}
 * ),
 * @ApiFilter(BooleanFilter::class, properties={"isTechnic"})
 */

class Recipe
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"read:recipe"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     * @Groups({"read:recipe"})
     */
    private $name;

    /**
     * @ORM\Column(type="text", nullable=true)
     * @Groups({"read:recipe"})
     */
    private $comment;

    /**
     * @ORM\Column(type="time", nullable=true)
     * @Groups({"read:recipe"})
     */
    private $duration;

    /**
     * @ORM\Column(type="integer", nullable=true)
     * @Groups({"read:recipe"})
     */
    private $portion;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     * @Groups({"read:recipe"})
     */
    private $internal;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     * @Groups({"read:recipe"})
     */
    private $moment;

    /**
     * @ORM\Column(type="integer", nullable=true)
     * @Groups({"read:recipe"})
     */
    private $sellPrice;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     * @Groups({"read:recipe"})
     */
    private $usable;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     * @Groups({"read:recipe"})
     */
    private $isTechnic;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     * @Groups({"read:recipe"})
     */
    private $isArchive;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $date_edit;

    /**
     * @ORM\ManyToMany(targetEntity=Category::class, inversedBy="recipes")
     * @Groups({"read:recipe"})
     */
    private $categories;

    /**
     * @ORM\ManyToMany(targetEntity=Material::class, inversedBy="recipes")
     */
    private $materials;

    /**
     * @ORM\OneToMany(targetEntity=Step::class, mappedBy="STE_in_recipe_id")
     */
    private $REC_have_steps;

    public function __construct()
    {
        $this->REC_have_steps = new ArrayCollection();
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
     *  Remove because ERR : Return value must be of type Doctrine\\Common\\Collections\\Collection, null returned
     */
    // public function getCategories(): Collection
    // {
    //     return $this->categories;
    // }

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
     * @return Collection|Step[]
     */
    public function getRECHaveSteps(): Collection
    {
        return $this->REC_have_steps;
    }

    public function addRECHaveStep(Step $rECHaveStep): self
    {
        if (!$this->REC_have_steps->contains($rECHaveStep)) {
            $this->REC_have_steps[] = $rECHaveStep;
            $rECHaveStep->setSTEInRecipeId($this);
        }

        return $this;
    }

    public function removeRECHaveStep(Step $rECHaveStep): self
    {
        if ($this->REC_have_steps->removeElement($rECHaveStep)) {
            // set the owning side to null (unless already changed)
            if ($rECHaveStep->getSTEInRecipeId() === $this) {
                $rECHaveStep->setSTEInRecipeId(null);
            }
        }

        return $this;
    }
}
