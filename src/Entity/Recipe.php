<?php

namespace App\Entity;

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
}
