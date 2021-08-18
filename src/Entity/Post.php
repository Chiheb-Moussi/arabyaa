<?php

namespace App\Entity;

use App\Repository\PostRepository;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Gedmo\Timestampable\Traits\TimestampableEntity;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=PostRepository::class)
 * @Gedmo\SoftDeleteable(fieldName="deletedAt", timeAware=false)
 * @Vich\Uploadable
 */
class Post
{
    const TYPE_ACTUALITE = 'Actualité';
    const TYPE_PRESSE = 'Presse';

    use TimestampableEntity;
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @Assert\NotBlank(
     *      message= "Le titre d'article est obligatoire !"
     * )
     * @ORM\Column(type="string", length=255)
     */
    private $title;

    /**
     * @Gedmo\Slug(fields={"title","createdAt"}, updatable=false, separator="_")
     * @ORM\Column(type="string", length=255, unique=true, nullable=true)
     */
    private $slug;

    /**
     * @Assert\NotBlank(
     *      message= "Le contenu d'article est obligatoire !"
     * )
     * @ORM\Column(type="text")
     */
    private $content;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $type;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $image;

    /**
     *
     * @Assert\Image(
     *      maxSize = "4M",
     *      maxSizeMessage = "La taille de l'image ne doit pas dépasser 4M !",
     *      mimeTypes = {"image/png", "image/jpeg"},
     *      mimeTypesMessage= "L'image doit être de type PNG ou JPEG ou JPG !"
     * )
     * @Vich\UploadableField(mapping="post_photo", fileNameProperty="image")
     * 
     * @var File|null
     */
    private $imageFile;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $deletedAt;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="posts")
     * @ORM\JoinColumn(nullable=true)
     */
    private $user;

    /**
     * @Assert\NotBlank(
     *      message= "La description de l'article est obligatoire !"
     * )
     * @ORM\Column(type="text")
     */
    private $description;

    public function __construct() {

        $this->type = self::TYPE_ACTUALITE;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getSlug()
    {
        return $this->slug;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(string $content): self
    {
        $this->content = $content;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getImageFile(): ?File
    {
        return $this->imageFile;
    }

    public function setImageFile(?File $imageFile=null): void
    {
        $this->imageFile = $imageFile;

        if (null !== $imageFile) {
            $this->updatedAt = new \DateTimeImmutable();
        }
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getDeletedAt(): ?\DateTimeInterface
    {
        return $this->deletedAt;
    }
    
    public function setDeletedAt(?\DateTimeInterface $deletedAt): void
    {
        $this->deletedAt = $deletedAt;
    }

    public function getContentText(): ?string
    {
        $contentText='';
        $array_content= explode('>',$this->content);
        if(count($array_content)>0) {
            for ($i=0; $i < count($array_content); $i++) {
                if($i==0) {
                    $contentText.=$array_content[$i].'>';
                }
                elseif($i < count($array_content) - 1) {
                    $contentText.=$array_content[$i].'>&nbsp;';
                }else {
                    $contentText.=$array_content[$i];
                }
            }
        }

        
        return html_entity_decode(strip_tags($contentText));
    }

    public function getDescription($length=0): ?string
    {
        $description= $this->description;
        if($length) {
            if(strlen($description)> $length) {
                return substr($description,0,$length).'...';
            }
        }
        return $description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }
}
