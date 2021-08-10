<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Gedmo\Mapping\Annotation as Gedmo;
use Gedmo\Timestampable\Traits\TimestampableEntity;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 * @UniqueEntity(fields={"email"}, message="There is already an account with this email")
 * @Gedmo\SoftDeleteable(fieldName="deletedAt", timeAware=false)
 * @Vich\Uploadable
 */
class User implements UserInterface, PasswordAuthenticatedUserInterface
{

    const USER_TYPE_ETUDIANT='Etudiant';
    const USER_TYPE_ENSEIGNANT='Enseignant';
    const USER_TYPE_PARENT='Parent';
    const USER_TYPE_INSPECTEUR='Inspecteur';
    const USER_TYPE_AMBASSADEUR='Ambassadeur';
    const USER_TYPE_PARTENARIAT='Partenariat';
    const USER_TYPE_ADMINISTRATEUR='Administrateur';


    const ROLE_ETUDIANT='ROLE_ETUDIANT';
    const ROLE_ENSEIGNANT='ROLE_ENSEIGNANT';
    const ROLE_PARENT='ROLE_PARENT';
    const ROLE_INSPECTEUR='ROLE_INSPECTEUR';
    const ROLE_AMBASSADEUR='ROLE_AMBASSADEUR';
    const ROLE_PARTENARIAT='ROLE_PARTENARIAT';
    const ROLE_ADMINISTRATEUR='ROLE_ADMINISTRATEUR';
    const ROLE_SUPER_ADMIN='ROLE_SUPER_ADMIN';

    /** 
     * @var array 
    */
    protected static $arrayRoles = [
        self::USER_TYPE_ETUDIANT     => self::ROLE_ETUDIANT,
        self::USER_TYPE_ENSEIGNANT     => self::ROLE_ENSEIGNANT,
        self::USER_TYPE_PARENT     => self::ROLE_PARENT,
        self::USER_TYPE_INSPECTEUR     => self::ROLE_INSPECTEUR,
        self::USER_TYPE_AMBASSADEUR      => self::ROLE_AMBASSADEUR,
        self::ROLE_PARTENARIAT      => self::ROLE_PARTENARIAT,
        self::USER_TYPE_ADMINISTRATEUR    => self::ROLE_ADMINISTRATEUR,
    ];

    

    

    use TimestampableEntity;
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=180, unique=true)
     */
    private $email;

    /**
     * @ORM\Column(type="json")
     */
    private $roles = [];

    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $userType;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $prenom;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $dateNaissance;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $adresse;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $ville;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $codePostal;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $gouvernerat;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $pays;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $tel;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $whatsapp;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $fbLink;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $iban;

    /**
     * @ORM\Column(type="string", length=255, nullable=true, nullable=true)
     */
    private $bic;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="fils")
     */
    private $parent;

    /**
     * @ORM\OneToMany(targetEntity=User::class, mappedBy="parent")
     */
    private $fils;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $ecole;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $classe;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $ministere;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $webLink;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $deletedAt;

    

    /**
     * @ORM\OneToMany(targetEntity=Diplome::class, mappedBy="user", orphanRemoval=true, cascade={"persist", "remove"})
     */
    private $diplomes;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $photo;

    /**
     * @Vich\UploadableField(mapping="user_photo", fileNameProperty="photo")
     * 
     * @var File|null
     */
    private $photoFile;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $passport;

    /**
     * @Vich\UploadableField(mapping="user_passport", fileNameProperty="passport")
     * 
     * @var File|null
     */
    private $passportFile;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $cin;

    /**
     * @Vich\UploadableField(mapping="user_cin", fileNameProperty="cin")
     * 
     * @var File|null
     */
    private $cinFile;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $cv;

    /**
     * @Vich\UploadableField(mapping="user_cv", fileNameProperty="cv")
     * 
     * @var File|null
     */
    private $cvFile;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $motivationLetter;

    /**
     * @Vich\UploadableField(mapping="user_motivation_letter", fileNameProperty="motivationLetter")
     * 
     * @var File|null
     */
    private $motivationLetterFile;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $bulletin;

    /**
     * @Vich\UploadableField(mapping="user_bulletin", fileNameProperty="bulletin")
     * 
     * @var File|null
     */
    private $bulletinFile;

    



    public function __construct()
    {
        $this->fils = new ArrayCollection();
        $this->diplomes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->email;
    }

    
    public function getUsername(): string
    {
        return (string) $this->username;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $roles[] = 'ROLE_USER';
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Returning a salt is only needed, if you are not using a modern
     * hashing algorithm (e.g. bcrypt or sodium) in your security.yaml.
     *
     * @see UserInterface
     */
    public function getSalt(): ?string
    {
        return null;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getUserType(): ?string
    {
        return $this->userType;
    }

    public function setUserType(string $userType): self
    {
        $this->userType = $userType;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getDateNaissance(): ?\DateTimeInterface
    {
        return $this->dateNaissance;
    }

    public function setDateNaissance(\DateTimeInterface $dateNaissance): self
    {
        $this->dateNaissance = $dateNaissance;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(string $ville): self
    {
        $this->ville = $ville;

        return $this;
    }

    public function getCodePostal(): ?int
    {
        return $this->codePostal;
    }

    public function setCodePostal(int $codePostal): self
    {
        $this->codePostal = $codePostal;

        return $this;
    }

    public function getGouvernerat(): ?string
    {
        return $this->gouvernerat;
    }

    public function setGouvernerat(string $gouvernerat): self
    {
        $this->gouvernerat = $gouvernerat;

        return $this;
    }

    public function getPays(): ?string
    {
        return $this->pays;
    }

    public function setPays(string $pays): self
    {
        $this->pays = $pays;

        return $this;
    }

    public function getTel(): ?string
    {
        return $this->tel;
    }

    public function setTel(string $tel): self
    {
        $this->tel = $tel;

        return $this;
    }

    public function getWhatsapp(): ?string
    {
        return $this->whatsapp;
    }

    public function setWhatsapp(?string $whatsapp): self
    {
        $this->whatsapp = $whatsapp;

        return $this;
    }

    public function getFbLink(): ?string
    {
        return $this->fbLink;
    }

    public function setFbLink(?string $fbLink): self
    {
        $this->fbLink = $fbLink;

        return $this;
    }

    public function getIban(): ?string
    {
        return $this->iban;
    }

    public function setIban(string $iban): self
    {
        $this->iban = $iban;

        return $this;
    }

    public function getBic(): ?string
    {
        return $this->bic;
    }

    public function setBic(?string $bic): self
    {
        $this->bic = $bic;

        return $this;
    }

    public function getParent(): ?self
    {
        return $this->parent;
    }

    public function setParent(?self $parent): self
    {
        $this->parent = $parent;

        return $this;
    }

    /**
     * @return Collection|self[]
     */
    public function getFils(): Collection
    {
        return $this->fils;
    }

    public function addFil(self $fil): self
    {
        if (!$this->fils->contains($fil)) {
            $this->fils[] = $fil;
            $fil->setParent($this);
        }

        return $this;
    }

    public function removeFil(self $fil): self
    {
        if ($this->fils->removeElement($fil)) {
            // set the owning side to null (unless already changed)
            if ($fil->getParent() === $this) {
                $fil->setParent(null);
            }
        }

        return $this;
    }

    public function getEcole(): ?string
    {
        return $this->ecole;
    }

    public function setEcole(?string $ecole): self
    {
        $this->ecole = $ecole;

        return $this;
    }

    public function getClasse(): ?string
    {
        return $this->classe;
    }

    public function setClasse(?string $classe): self
    {
        $this->classe = $classe;

        return $this;
    }

    public function getMinistere(): ?string
    {
        return $this->ministere;
    }

    public function setMinistere(?string $ministere): self
    {
        $this->ministere = $ministere;

        return $this;
    }

    public function getWebLink(): ?string
    {
        return $this->webLink;
    }

    public function setWebLink(?string $webLink): self
    {
        $this->webLink = $webLink;

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

    /**
     * @return Collection|Diplome[]
     */
    public function getDiplomes(): Collection
    {
        return $this->diplomes;
    }

    public function addDiplome(Diplome $diplome): self
    {
        if (!$this->diplomes->contains($diplome)) {
            $this->diplomes[] = $diplome;
            $diplome->setUser($this);
        }

        return $this;
    }

    public function removeDiplome(Diplome $diplome): self
    {
        if ($this->diplomes->removeElement($diplome)) {
            // set the owning side to null (unless already changed)
            if ($diplome->getUser() === $this) {
                $diplome->setUser(null);
            }
        }

        return $this;
    }

    //photo 

    public function getPhoto(): ?string
    {
        return $this->photo;
    }

    public function setPhoto(?string $photo): void
    {
        $this->photo = $photo;
    }

    public function getPhotoFile(): ?File
    {
        return $this->photoFile;
    }

    public function setPhotoFile(?File $photoFile = null): void
    {
        $this->photoFile = $photoFile;

        if (null !== $photoFile) {
            $this->updatedAt = new \DateTimeImmutable();
        }
    }

    //passport

    public function getPassport(): ?string
    {
        return $this->passport;
    }

    public function setPassport(?string $passport): void
    {
        $this->passport = $passport;
    }

    public function getPassportFile(): ?File
    {
        return $this->passportFile;
    }

    public function setPassportFile(?File $passportFile = null): void
    {
        $this->passportFile = $passportFile;

        if (null !== $passportFile) {
            $this->updatedAt = new \DateTimeImmutable();
        }
    }

    //cin

    public function getCin(): ?string
    {
        return $this->cin;
    }

    public function setCin(?string $cin): void
    {
        $this->cin = $cin;
    }

    public function getCinFile(): ?File
    {
        return $this->cinFile;
    }

    public function setCinFile(?File $cinFile = null): void
    {
        $this->cinFile = $cinFile;

        if (null !== $cinFile) {
            $this->updatedAt = new \DateTimeImmutable();
        }
    }


    //cv

    public function getCv(): ?string
    {
        return $this->cv;
    }

    public function setCv(?string $cv): void
    {
        $this->cv = $cv;
    }

    public function getCvFile(): ?File
    {
        return $this->cvFile;
    }

    public function setCvFile(?File $cvFile = null): void
    {
        $this->cvFile = $cvFile;

        if (null !== $cvFile) {
            $this->updatedAt = new \DateTimeImmutable();
        }
    }

    //motivationLetter

    public function getMotivationLetter(): ?string
    {
        return $this->motivationLetter;
    }

    public function setMotivationLetter(?string $motivationLetter): void
    {
        $this->motivationLetter = $motivationLetter;
    }

    public function getMotivationLetterFile(): ?File
    {
        return $this->motivationLetterFile;
    }

    public function setMotivationLetterFile(?File $motivationLetterFile = null): void
    {
        $this->motivationLetterFile = $motivationLetterFile;

        if (null !== $motivationLetterFile) {
            $this->updatedAt = new \DateTimeImmutable();
        }
    }

    //bulletin

    public function getBulletin(): ?string
    {
        return $this->bulletin;
    }

    public function setBulletin(?string $bulletin): void
    {
        $this->bulletin = $bulletin;
    }

    public function getBulletinFile(): ?File
    {
        return $this->bulletinFile;
    }

    public function setBulletinFile(?File $bulletinFile = null): void
    {
        $this->bulletinFile = $bulletinFile;

        if (null !== $bulletinFile) {
            $this->updatedAt = new \DateTimeImmutable();
        }
    }


    /**
     * @param  string $userType
     * @return string
     */
    public static function getRoleByUserType($userType)
    {
        if (!isset(static::$arrayRoles[$userType])) {
            return "";
        }

        return static::$arrayRoles[$userType];
    }


    /**
     * @return array<string>
     */
    public static function getAvailableUserTypes()
    {
        return [
            self::USER_TYPE_ETUDIANT,
            self::USER_TYPE_ENSEIGNANT,
            self::USER_TYPE_PARENT,
            self::USER_TYPE_INSPECTEUR,
            self::USER_TYPE_AMBASSADEUR,
            self::USER_TYPE_PARTENARIAT,
            self::USER_TYPE_ADMINISTRATEUR
        ];
    }

    

    
}
