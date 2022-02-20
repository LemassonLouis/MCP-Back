<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\ImageRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=ImageRepository::class)
 * @ApiResource(
 *      normalizationContext={"groups"={"read:image"}},
 * )
 */
class Image
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"read:image"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"read:image"})
     */
    private $IMG_name;

    /**
     * @ORM\Column(type="string", length=512)
     * @Groups({"read:image"})
     */
    private $IMG_uri;

    /**
     * @ORM\Column(type="datetime")
     * @Groups({"read:image"})
     */
    private $IMG_date_edit;

    /**
     * @ORM\OneToOne(targetEntity=Ingredient::class, mappedBy="image", cascade={"persist", "remove"})
     */
    private $ingredient;

    /**
     * @ORM\OneToOne(targetEntity=Material::class, mappedBy="image", cascade={"persist", "remove"})
     */
    private $material;

    /**
     * @ORM\ManyToOne(targetEntity=Recipe::class, inversedBy="images")
     */
    private $recipe;

    /**
     * @ORM\OneToOne(targetEntity=Step::class, mappedBy="image", cascade={"persist", "remove"})
     */
    private $step;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIMGName(): ?string
    {
        return $this->IMG_name;
    }

    public function setIMGName(?string $IMG_name): self
    {
        $this->IMG_name = $IMG_name;

        return $this;
    }

    public function getIMGUri(): ?string
    {
        return $this->IMG_uri;
    }

    public function setIMGUri(string $IMG_uri): self
    {
        $this->IMG_uri = $IMG_uri;

        return $this;
    }

    public function getIMGDateEdit(): ?\DateTimeInterface
    {
        return $this->IMG_date_edit;
    }

    public function setIMGDateEdit(\DateTimeInterface $IMG_date_edit): self
    {
        $this->IMG_date_edit = $IMG_date_edit;

        return $this;
    }

    public function getIngredient(): ?Ingredient
    {
        return $this->ingredient;
    }

    public function setIngredient(?Ingredient $ingredient): self
    {
        // unset the owning side of the relation if necessary
        if ($ingredient === null && $this->ingredient !== null) {
            $this->ingredient->setImage(null);
        }

        // set the owning side of the relation if necessary
        if ($ingredient !== null && $ingredient->getImage() !== $this) {
            $ingredient->setImage($this);
        }

        $this->ingredient = $ingredient;

        return $this;
    }

    public function getMaterial(): ?Material
    {
        return $this->material;
    }

    public function setMaterial(?Material $material): self
    {
        // unset the owning side of the relation if necessary
        if ($material === null && $this->material !== null) {
            $this->material->setImage(null);
        }

        // set the owning side of the relation if necessary
        if ($material !== null && $material->getImage() !== $this) {
            $material->setImage($this);
        }

        $this->material = $material;

        return $this;
    }

    public function getRecipe(): ?Recipe
    {
        return $this->recipe;
    }

    public function setRecipe(?Recipe $recipe): self
    {
        $this->recipe = $recipe;

        return $this;
    }

    public function getStep(): ?Step
    {
        return $this->step;
    }

    public function setStep(?Step $step): self
    {
        // unset the owning side of the relation if necessary
        if ($step === null && $this->step !== null) {
            $this->step->setImage(null);
        }

        // set the owning side of the relation if necessary
        if ($step !== null && $step->getImage() !== $this) {
            $step->setImage($this);
        }

        $this->step = $step;

        return $this;
    }
}
