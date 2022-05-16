<?php

/**
 * @author Jérémie Fauveau
 * @create date 2022-05-15 22:02:05
 * @modify date 2022-05-15 22:02:05
 * @desc [description]
 */

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
    private $name;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"read:supplier"})
     */
    private $address;

    /**
     * @ORM\Column(type="string", length=10, nullable=true)
     * @Groups({"read:supplier"})
     */
    private $zip;

    /**
     * @ORM\Column(type="string", length=30, nullable=true)
     * @Groups({"read:supplier"})
     */
    private $city;

    /**
     * @ORM\Column(type="string", length=15, nullable=true)
     * @Groups({"read:supplier"})
     */
    private $phone;

    /**
     * @ORM\Column(type="string", length=40, nullable=true)
     * @Groups({"read:supplier"})
     */
    private $mail;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     * @Groups({"read:supplier"})
     */
    private $isArchive;

    /**
     * @ORM\Column(type="date", nullable=true)
     * @Groups({"read:supplier"})
     */
    private $dateEdit;

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

    /**
     * Get the value of name
     */ 
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */ 
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of address
     */ 
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set the value of address
     *
     * @return  self
     */ 
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get the value of zip
     */ 
    public function getZip()
    {
        return $this->zip;
    }

    /**
     * Set the value of zip
     *
     * @return  self
     */ 
    public function setZip($zip)
    {
        $this->zip = $zip;

        return $this;
    }

    /**
     * Get the value of city
     */ 
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set the value of city
     *
     * @return  self
     */ 
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get the value of phone
     */ 
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set the value of phone
     *
     * @return  self
     */ 
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get the value of mail
     */ 
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * Set the value of mail
     *
     * @return  self
     */ 
    public function setMail($mail)
    {
        $this->mail = $mail;

        return $this;
    }

    /**
     * Get the value of isArchive
     */ 
    public function getIsArchive()
    {
        return $this->isArchive;
    }

    /**
     * Set the value of isArchive
     *
     * @return  self
     */ 
    public function setIsArchive($isArchive)
    {
        $this->isArchive = $isArchive;

        return $this;
    }

    /**
     * Get the value of dateEdit
     */ 
    public function getDateEdit()
    {
        return $this->dateEdit;
    }

    /**
     * Set the value of dateEdit
     *
     * @return  self
     */ 
    public function setDateEdit($dateEdit)
    {
        $this->dateEdit = $dateEdit;

        return $this;
    }
}
