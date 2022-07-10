<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\UserRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UserRepository::class)]
#[ORM\Table(name: 'users')]
#[ApiResource]
class User
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    #[ORM\OneToMany(mappedBy: 'user', targetEntity: 'App\Entity\Kind')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $username;

    #[ORM\Column(type: 'string', length: 255)]
    private $password;

    #[ORM\Column(type: 'string', length: 255)]
    private $email;

    #[ORM\Column(type: 'date')]
    private $birthdate;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $defaultGenre;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $description1;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $description2;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $description3;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $description4;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $guiLanguage;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $resultsPerPage;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $listsOrder;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $userKind;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
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

    public function getBirthdate(): ?\DateTimeInterface
    {
        return $this->birthdate;
    }

    public function setBirthdate(\DateTimeInterface $birthdate): self
    {
        $this->birthdate = $birthdate;

        return $this;
    }

    public function getDefaultGenre(): ?int
    {
        return $this->defaultGenre;
    }

    public function setDefaultGenre(?int $defaultGenre): self
    {
        $this->defaultGenre = $defaultGenre;

        return $this;
    }

    public function getDescription1(): ?string
    {
        return $this->description1;
    }

    public function setDescription1(?string $description1): self
    {
        $this->description1 = $description1;

        return $this;
    }

    public function getDescription2(): ?string
    {
        return $this->description2;
    }

    public function setDescription2(?string $description2): self
    {
        $this->description2 = $description2;

        return $this;
    }

    public function getDescription3(): ?string
    {
        return $this->description3;
    }

    public function setDescription3(?string $description3): self
    {
        $this->description3 = $description3;

        return $this;
    }

    public function getDescription4(): ?string
    {
        return $this->description4;
    }

    public function setDescription4(?string $description4): self
    {
        $this->description4 = $description4;

        return $this;
    }

    public function getGuiLanguage(): ?int
    {
        return $this->guiLanguage;
    }

    public function setGuiLanguage(?int $guiLanguage): self
    {
        $this->guiLanguage = $guiLanguage;

        return $this;
    }

    public function getResultsPerPage(): ?int
    {
        return $this->resultsPerPage;
    }

    public function setResultsPerPage(?int $resultsPerPage): self
    {
        $this->resultsPerPage = $resultsPerPage;

        return $this;
    }

    public function getListsOrder(): ?int
    {
        return $this->listsOrder;
    }

    public function setListsOrder(?int $listsOrder): self
    {
        $this->listsOrder = $listsOrder;

        return $this;
    }

    public function getUserKind(): ?int
    {
        return $this->userKind;
    }

    public function setUserKind(?int $userKind): self
    {
        $this->userKind = $userKind;

        return $this;
    }
}
