<?php

// LEMASSON Louis

namespace App\Entity;

use App\Repository\ImageRepository;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\HttpFoundation\File\File;


/**
 * @ORM\Entity(repositoryClass=ImageRepository::class)
 * @Vich\Uploadable()
 * @ApiResource(
 *      collectionOperations={},
 *      itemOperations={
 *          "GET",
 *          "DELETE",
 *          "images"={
 *              "method"="POST",
 *              "path"="/images",
 *              "deserialize"=false,
 *              "controller"=ImageController::class
 *          }
 *      },
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
     * @var File|null
     * @Vich\UploadableField(mapping="image", fileNameProperty="$IMG_uri")
     */
    private $file;

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

    /**
     * Get the value of file
     *
     * @return  File|null
     */
    public function getFile()
    {
        return $this->file;
    }

    /**
     * Set the value of file
     *
     * @param  File|null  $file
     *
     * @return  self
     */
    public function setFile($file)
    {
        $this->file = $file;

        return $this;
    }
}
