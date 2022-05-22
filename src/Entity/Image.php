<?php
// LEMASSON Louis

namespace App\Entity;

use App\Repository\ImageRepository;
use ApiPlatform\Core\Annotation\ApiResource;
use App\Controller\ImageController;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\Serializer\Annotation\Groups;
use Vich\UploaderBundle\Mapping\Annotation as Vich;



/**
 * @ORM\Entity(repositoryClass=ImageRepository::class)
 * @Vich\Uploadable()
 * @ApiResource(
 *      normalizationContext={"groups"={"read:image"}},
 *      collectionOperations={
 *          "post"={
 *              "deserialize"=false,
 *              "controller"=ImageController::class,
 *              "input_formats"={"multipart"={"multipart/form-data"}}
 *          }
 *      },
 *      itemOperations={
 *          "get",
 *          "delete"
 *      },
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
     * @Vich\UploadableField(mapping="images", fileNameProperty="fileName")
     */
    private $file;

    /**
     * @var string|null
     */
    private $fileName;

    /**
     * @ORM\ManyToOne(targetEntity=User::class)
     * @ORM\JoinColumn(nullable=false)
     * @Groups({"read:image"})
     */
    private $IMG_created_by;

    /**
     * @ORM\Column(type="datetime_immutable", nullable=false)
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


    /**
     * Get the value of fileName
     *
     * @return  string|null
     */
    public function getFileName()
    {
        return $this->fileName;
    }

    /**
     * Set the value of fileName
     *
     * @param  string|null  $fileName
     *
     * @return  self
     */
    public function setFileName($fileName)
    {
        $this->fileName = $fileName;

        return $this;
    }
}
