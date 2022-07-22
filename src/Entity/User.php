<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\UsersRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

#[ORM\Entity(repositoryClass: UsersRepository::class)]
#[ORM\Table(name: 'users')]
#[ApiResource(
    collectionOperations: [
        'get' => [
            'path' => '/users'
        ],
        'post' => [
            'path' => '/user'
        ]
    ],
    itemOperations: [
        'get' => [
            'path' => '/user/{id}'
        ],
        'put' => [
            'path' => '/user/{id}'
        ],
        'delete' => [
            'path' => '/user/{id}'
        ]
    ]
)]
class User implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
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

    #[ORM\OneToMany(mappedBy: 'user', targetEntity: Locus::class, orphanRemoval: true)]
    private $loca;

    #[ORM\OneToMany(mappedBy: 'user', targetEntity: Praxis::class, orphanRemoval: true)]
    private $practica;

    #[ORM\OneToMany(mappedBy: 'user', targetEntity: Amor::class, orphanRemoval: true)]
    private $amores;

    #[ORM\OneToMany(mappedBy: 'user', targetEntity: Assignation::class, orphanRemoval: true)]
    private $assignations;

    #[ORM\OneToMany(mappedBy: 'user', targetEntity: Kind::class, orphanRemoval: true)]
    private $kinds;

    #[ORM\OneToMany(mappedBy: 'user', targetEntity: Country::class, orphanRemoval: true)]
    private $countries;

    #[ORM\Column(type: 'json')]
    private $roles;

    public function __construct()
    {
        $this->loca = new ArrayCollection();
        $this->practica = new ArrayCollection();
        $this->amores = new ArrayCollection();
        $this->assignations = new ArrayCollection();
        $this->kinds = new ArrayCollection();
        $this->countries = new ArrayCollection();
    }

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

    /**
     * @return Collection<int, Locus>
     */
    public function getLoca(): Collection
    {
        return $this->loca;
    }

    public function addLoca(Locus $loca): self
    {
        if (!$this->loca->contains($loca)) {
            $this->loca[] = $loca;
            $loca->setUser($this);
        }

        return $this;
    }

    public function removeLoca(Locus $loca): self
    {
        if ($this->loca->removeElement($loca)) {
            // set the owning side to null (unless already changed)
            if ($loca->getUser() === $this) {
                $loca->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Praxis>
     */
    public function getPractica(): Collection
    {
        return $this->practica;
    }

    public function addPractica(Praxis $practica): self
    {
        if (!$this->practica->contains($practica)) {
            $this->practica[] = $practica;
            $practica->setUser($this);
        }

        return $this;
    }

    public function removePractica(Praxis $practica): self
    {
        if ($this->practica->removeElement($practica)) {
            // set the owning side to null (unless already changed)
            if ($practica->getUser() === $this) {
                $practica->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Amor>
     */
    public function getAmores(): Collection
    {
        return $this->amores;
    }

    public function addAmore(Amor $amore): self
    {
        if (!$this->amores->contains($amore)) {
            $this->amores[] = $amore;
            $amore->setUser($this);
        }

        return $this;
    }

    public function removeAmore(Amor $amore): self
    {
        if ($this->amores->removeElement($amore)) {
            // set the owning side to null (unless already changed)
            if ($amore->getUser() === $this) {
                $amore->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Assignation>
     */
    public function getAssignations(): Collection
    {
        return $this->assignations;
    }

    public function addAssignation(Assignation $assignation): self
    {
        if (!$this->assignations->contains($assignation)) {
            $this->assignations[] = $assignation;
            $assignation->setUser($this);
        }

        return $this;
    }

    public function removeAssignation(Assignation $assignation): self
    {
        if ($this->assignations->removeElement($assignation)) {
            // set the owning side to null (unless already changed)
            if ($assignation->getUser() === $this) {
                $assignation->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Kind>
     */
    public function getKinds(): Collection
    {
        return $this->kinds;
    }

    public function addKind(Kind $kind): self
    {
        if (!$this->kinds->contains($kind)) {
            $this->kinds[] = $kind;
            $kind->setUser($this);
        }

        return $this;
    }

    public function removeKind(Kind $kind): self
    {
        if ($this->kinds->removeElement($kind)) {
            // set the owning side to null (unless already changed)
            if ($kind->getUser() === $this) {
                $kind->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Country>
     */
    public function getCountries(): Collection
    {
        return $this->countries;
    }

    public function addCountry(Country $country): self
    {
        if (!$this->countries->contains($country)) {
            $this->countries[] = $country;
            $country->setUser($this);
        }

        return $this;
    }

    public function removeCountry(Country $country): self
    {
        if ($this->countries->removeElement($country)) {
            // set the owning side to null (unless already changed)
            if ($country->getUser() === $this) {
                $country->setUser(null);
            }
        }

        return $this;
    }

    public function __toString(): string
    {
        return json_encode([
            'id' => $this->getId(),
            'username' => $this->getUsername(),
            'password' => $this->getPassword(),
            'email' => $this->getEmail(),
        ]);
    }


    public function getRoles(): array
    {
        return $this->roles; // tmp
    }

    public function eraseCredentials()
    {
        // TODO: Implement eraseCredentials() method.
    }

    public function getUserIdentifier(): string
    {
        return $this->getEmail();
    }
}
