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
}
