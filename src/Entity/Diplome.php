<?php

namespace App\Entity;

use App\Repository\DiplomeRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Gedmo\Mapping\Annotation as Gedmo;
use Gedmo\Timestampable\Traits\TimestampableEntity;


/**
 * @ORM\Entity(repositoryClass=DiplomeRepository::class)
 * @Vich\Uploadable
 */
class Diplome
{
    use TimestampableEntity;
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $diplome;

    /**
     * @Vich\UploadableField(mapping="user_diplome", fileNameProperty="diplome")
     * 
     * @var File|null
     */
    private $diplomeFile;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="diplomes")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDiplome(): ?string
    {
        return $this->diplome;
    }

    public function setDiplome(?string $diplome): void
    {
        $this->diplome = $diplome;
    }

    public function getDiplomeFile(): ?File
    {
        return $this->diplomeFile;
    }

    public function setDiplomeFile(?File $diplomeFile = null): void
    {
        $this->diplomeFile = $diplomeFile;

        if (null !== $diplomeFile) {
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
}
