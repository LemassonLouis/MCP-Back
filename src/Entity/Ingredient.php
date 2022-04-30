<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\IngredientRepository;
use ApiPlatform\Core\Annotation\ApiFilter;
use Doctrine\Common\Collections\Collection;
use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\BooleanFilter;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Serializer\Annotation\Groups;


/**
 * @ORM\Entity(repositoryClass=IngredientRepository::class)
 * @ApiResource(
 *      attributes={
 *          "order"={"ING_name": "ASC"}
 *      },
 *      normalizationContext={"groups"={"read:ingredient"}},
 *      collectionOperations={"GET","POST"},
 *      itemOperations={"GET", "PUT", "DELETE"}
 * ),
 * @ApiFilter(BooleanFilter::class, properties={"ING_vege", "ING_allergen"})
 */
class Ingredient
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"read:ingredient"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=64)
     * @Groups({"read:ingredient"})
     */
    private $ING_name;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     * @Groups({"read:ingredient"})
     */
    private $ING_allergen;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     * @Groups({"read:ingredient"})
     */
    private $ING_vege;

    /**
     * @ORM\Column(type="string", length=32, nullable=true)
     * @Groups({"read:ingredient"})
     */
    private $ING_unit;

    /**
     * @ORM\Column(type="integer", nullable=true)
     * @Groups({"read:ingredient"})
     */
    private $ING_price;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     * @Groups({"read:ingredient"})
     */
    private $ING_isArchive;

    /**
     * @ORM\Column(type="date", nullable=true)
     * @Groups({"read:ingredient"})
     */
    private $ING_date_edit;

    /**
     * @ORM\ManyToMany(targetEntity=Season::class, mappedBy="ingredient")
     * @Groups({"read:ingredient"})
     */
    private $seasons;

    /**
     * @ORM\ManyToOne(targetEntity=Supplier::class, inversedBy="ingredients")
     */
    private $supplier;

    /**
     * @ORM\ManyToMany(targetEntity=Category::class, inversedBy="ingredients")
     */
    private $categories;

    /**
     * @ORM\OneToOne(targetEntity=Image::class, cascade={"persist", "remove"})
     */
    private $ING_image;

    public function __construct()
    {
        $this->seasons = new ArrayCollection();
        $this->categories = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getINGName(): ?string
    {
        return $this->ING_name;
    }

    public function setINGName(string $ING_name): self
    {
        $this->ING_name = $ING_name;

        return $this;
    }

    public function getINGAllergen(): ?bool
    {
        return $this->ING_allergen;
    }

    public function setINGAllergen(?bool $ING_allergen): self
    {
        $this->ING_allergen = $ING_allergen;

        return $this;
    }

    public function getINGVege(): ?bool
    {
        return $this->ING_vege;
    }

    public function setINGVege(?bool $ING_vege): self
    {
        $this->ING_vege = $ING_vege;

        return $this;
    }

    public function getINGUnit(): ?string
    {
        return $this->ING_unit;
    }

    public function setINGUnit(?string $ING_unit): self
    {
        $this->ING_unit = $ING_unit;

        return $this;
    }

    public function getINGPrice(): ?int
    {
        return $this->ING_price;
    }

    public function setINGPrice(?int $ING_price): self
    {
        $this->ING_price = $ING_price;

        return $this;
    }

    public function getINGIsArchive(): ?bool
    {
        return $this->ING_isArchive;
    }

    public function setINGIsArchive(?bool $ING_isArchive): self
    {
        $this->ING_isArchive = $ING_isArchive;

        return $this;
    }

    public function getINGDateEdit(): ?\DateTimeInterface
    {
        return $this->ING_date_edit;
    }

    public function setINGDateEdit(?\DateTimeInterface $ING_date_edit): self
    {
        $this->ING_date_edit = $ING_date_edit;

        return $this;
    }

    /**
     * @return Collection|Season[]
     */
    public function getSeasons(): Collection
    {
        return $this->seasons;
    }

    public function addSeason(Season $season): self
    {
        if (!$this->seasons->contains($season)) {
            $this->seasons[] = $season;
            $season->addIngredient($this);
        }

        return $this;
    }

    public function removeSeason(Season $season): self
    {
        if ($this->seasons->removeElement($season)) {
            $season->removeIngredient($this);
        }

        return $this;
    }

    public function getSupplier(): ?Supplier
    {
        return $this->supplier;
    }

    public function setSupplier(?Supplier $supplier): self
    {
        $this->supplier = $supplier;

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

    public function getINGImage(): ?Image
    {
        return $this->ING_image;
    }

    public function setINGImage(?Image $ING_image): self
    {
        $this->ING_image = $ING_image;

        return $this;
    }
}
