<?php

namespace App\Entity;

use App\Repository\ImageRepository;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;


/**
 * @ORM\Entity(repositoryClass=ImageRepository::class)
 * @ApiResource(
 *      collectionOperations={"POST"},
 *      itemOperations={"GET", "DELETE"},
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
     * @ORM\Column(type="string", length=512)
     * @Groups({"read:image"})
     */
    private $IMG_uri;

    /**
     * @ORM\ManyToOne(targetEntity=User::class)
     * @ORM\JoinColumn(nullable=false)
     * @Groups({"read:image"})
     */
    private $IMG_created_by;

    /**
     * @ORM\Column(type="datetime_immutable")
     * @Groups({"read:image"})
     */
    private $IMG_created_at;

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
}
