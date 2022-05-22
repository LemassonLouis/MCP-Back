<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\StepRepository;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;


// TODO : API access
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

    /**
     * @ORM\ManyToOne(targetEntity=Recipe::class, inversedBy="REC_have_steps")
     * @ORM\JoinColumn(nullable=false)
     */
    private $STE_in_recipe_id;

    /**
     * @ORM\ManyToOne(targetEntity=Recipe::class)
     */
    private $STE_have_recipe_id;

    /**
     * @ORM\OneToOne(targetEntity=Image::class, cascade={"persist", "remove"})
     */
    private $STE_image_id;

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

    public function getSTEInRecipeId(): ?Recipe
    {
        return $this->STE_in_recipe_id;
    }

    public function setSTEInRecipeId(?Recipe $STE_in_recipe_id): self
    {
        $this->STE_in_recipe_id = $STE_in_recipe_id;

        return $this;
    }

    public function getSTEHaveRecipeId(): ?Recipe
    {
        return $this->STE_have_recipe_id;
    }

    public function setSTEHaveRecipeId(?Recipe $STE_have_recipe_id): self
    {
        $this->STE_have_recipe_id = $STE_have_recipe_id;

        return $this;
    }

    public function getSTEImageId(): ?Image
    {
        return $this->STE_image_id;
    }

    public function setSTEImageId(?Image $STE_image_id): self
    {
        $this->STE_image_id = $STE_image_id;

        return $this;
    }
}
