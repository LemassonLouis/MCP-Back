<?php

namespace App\Entity;

use App\Repository\ImageRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ImageRepository::class)
 */
class Image
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=512)
     */
    private $IMG_uri;

    /**
     * @ORM\ManyToOne(targetEntity=User::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $IMG_created_by;

    /**
     * @ORM\Column(type="datetime_immutable")
     */
    private $IMG_created_at;

    /**
     * @ORM\ManyToOne(targetEntity=User::class)
     */
    private $IMG_updated_by;

    /**
     * @ORM\Column(type="datetime_immutable", nullable=true)
     */
    private $IMG_updated_at;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getIMGCreatedBy(): ?User
    {
        return $this->IMG_created_by;
    }

    public function setIMGCreatedBy(?User $IMG_created_by): self
    {
        $this->IMG_created_by = $IMG_created_by;

        return $this;
    }

    public function getIMGCreatedAt(): ?\DateTimeImmutable
    {
        return $this->IMG_created_at;
    }

    public function setIMGCreatedAt(\DateTimeImmutable $IMG_created_at): self
    {
        $this->IMG_created_at = $IMG_created_at;

        return $this;
    }

    public function getIMGUpdatedBy(): ?User
    {
        return $this->IMG_updated_by;
    }

    public function setIMGUpdatedBy(?User $IMG_updated_by): self
    {
        $this->IMG_updated_by = $IMG_updated_by;

        return $this;
    }

    public function getIMGUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->IMG_updated_at;
    }

    public function setIMGUpdatedAt(?\DateTimeImmutable $IMG_updated_at): self
    {
        $this->IMG_updated_at = $IMG_updated_at;

        return $this;
    }
}
