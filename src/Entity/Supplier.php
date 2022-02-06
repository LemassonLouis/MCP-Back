<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\SupplierRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SupplierRepository::class)
 */
#[ApiResource]
class Supplier
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
    private $SUP_name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $SUP_address;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $SUP_postal_code;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $SUP_city;

    /**
     * @ORM\Column(type="string", length=15)
     */
    private $SUP_phone;

    /**
     * @ORM\Column(type="string", length=40)
     */
    private $SUP_mail;

    /**
     * @ORM\Column(type="boolean")
     */
    private $SUP_isArchive;

    /**
     * @ORM\Column(type="date")
     */
    private $SUP_date_edit;

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

    public function getSUPPostalCode(): ?string
    {
        return $this->SUP_postal_code;
    }

    public function setSUPPostalCode(string $SUP_postal_code): self
    {
        $this->SUP_postal_code = $SUP_postal_code;

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
}
