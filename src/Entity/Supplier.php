<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\SupplierRepository;
use Doctrine\Common\Collections\Collection;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=SupplierRepository::class)
 * @ApiResource(
 *      normalizationContext={"groups"={"read:supplier"}},
 *      collectionOperations={"GET","POST"},
 *      itemOperations={"GET", "PUT", "DELETE"}
 * )
 */

class Supplier
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"read:supplier"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     * @Groups({"read:supplier"})
     */
    private $SUP_name;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"read:supplier"})
     */
    private $SUP_address;

    /**
     * @ORM\Column(type="string", length=10, nullable=true)
     * @Groups({"read:supplier"})
     */
    private $SUP_zipCode;

    /**
     * @ORM\Column(type="string", length=30, nullable=true)
     * @Groups({"read:supplier"})
     */
    private $SUP_city;

    /**
     * @ORM\Column(type="string", length=15, nullable=true)
     * @Groups({"read:supplier"})
     */
    private $SUP_phone;

    /**
     * @ORM\Column(type="string", length=40, nullable=true)
     * @Groups({"read:supplier"})
     */
    private $SUP_mail;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     * @Groups({"read:supplier"})
     */
    private $SUP_isArchive;

    /**
     * @ORM\Column(type="date", nullable=true)
     * @Groups({"read:supplier"})
     */
    private $SUP_date_edit;

    /**
     * @ORM\OneToMany(targetEntity=Ingredient::class, mappedBy="supplier")
     * @Groups({"read:supplier"})
     */
    private $ingredients;

    public function __construct()
    {
        $this->ingredients = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSUPName(): ?string
    {
        return $this->SUP_name;
    }

    public function setSUPName(string $SUP_name): self
    {
        $this->SUP_name = $SUP_name;

        return $this;
    }

    public function getSUPAddress(): ?string
    {
        return $this->SUP_address;
    }

    public function setSUPAddress(string $SUP_address): self
    {
        $this->SUP_address = $SUP_address;

        return $this;
    }

    /**
     * Get the value of SUP_zipCode
     */
    public function getSUP_zipCode(): string
    {
        return $this->SUP_zipCode;
    }

    /**
     * Set the value of SUP_zipCode
     *
     * @return  self
     */
    public function setSUP_zipCode($SUP_zipCode): self
    {
        $this->SUP_zipCode = $SUP_zipCode;

        return $this;
    }

    public function getSUPCity(): ?string
    {
        return $this->SUP_city;
    }

    public function setSUPCity(string $SUP_city): self
    {
        $this->SUP_city = $SUP_city;

        return $this;
    }

    public function getSUPPhone(): ?string
    {
        return $this->SUP_phone;
    }

    public function setSUPPhone(string $SUP_phone): self
    {
        $this->SUP_phone = $SUP_phone;

        return $this;
    }

    public function getSUPMail(): ?string
    {
        return $this->SUP_mail;
    }

    public function setSUPMail(string $SUP_mail): self
    {
        $this->SUP_mail = $SUP_mail;

        return $this;
    }

    public function getSUPIsArchive(): ?bool
    {
        return $this->SUP_isArchive;
    }

    public function setSUPIsArchive(bool $SUP_isArchive): self
    {
        $this->SUP_isArchive = $SUP_isArchive;

        return $this;
    }

    public function getSUPDateEdit(): ?\DateTimeInterface
    {
        return $this->SUP_date_edit;
    }

    public function setSUPDateEdit(\DateTimeInterface $SUP_date_edit): self
    {
        $this->SUP_date_edit = $SUP_date_edit;

        return $this;
    }

    /**
     * @return Collection|Ingredient[]
     */
    public function getIngredients(): Collection
    {
        return $this->ingredients;
    }

    public function addIngredient(Ingredient $ingredient): self
    {
        if (!$this->ingredients->contains($ingredient)) {
            $this->ingredients[] = $ingredient;
            $ingredient->setSupplier($this);
        }

        return $this;
    }

    public function removeIngredient(Ingredient $ingredient): self
    {
        if ($this->ingredients->removeElement($ingredient)) {
            // set the owning side to null (unless already changed)
            if ($ingredient->getSupplier() === $this) {
                $ingredient->setSupplier(null);
            }
        }

        return $this;
    }
}
