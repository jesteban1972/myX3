<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\LocusRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LocusRepository::class)]
#[ORM\Table(name: 'loca')]
#[ApiResource(
    collectionOperations: [
        'get' => [
            'path' => '/loca'
        ],
        'post' => [
            'path' => '/locus'
        ]
    ],
    itemOperations: [
        'get' => [
            'path' => '/locus/{id}'
        ],
        'put' => [
            'path' => '/locus/{id}'
        ],
        'delete' => [
            'path' => '/locus/{id}'
        ]
    ]
)]
class Locus
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $achtung;

    #[ORM\Column(type: 'string', length: 255)]
    private $name;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $rating;

    #[ORM\Column(type: 'boolean', nullable: true)]
    private $isFavorite;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $address;

    #[ORM\Column(type: 'integer')]
    private $country;

    #[ORM\Column(type: 'integer')]
    private $kind;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $description;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $coordinatesExact;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $coordinatesGeneric;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $web;

    #[ORM\ManyToOne(targetEntity: User::class, inversedBy: 'loca')]
    #[ORM\JoinColumn(nullable: false)]
    private $user;

    #[ORM\OneToMany(mappedBy: 'locus', targetEntity: Praxis::class, orphanRemoval: true)]
    private $practica;

    public function __construct()
    {
        $this->practica = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAchtung(): ?string
    {
        return $this->achtung;
    }

    public function setAchtung(?string $achtung): self
    {
        $this->achtung = $achtung;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getRating(): ?int
    {
        return $this->rating;
    }

    public function setRating(?int $rating): self
    {
        $this->rating = $rating;

        return $this;
    }

    public function isIsFavorite(): ?bool
    {
        return $this->isFavorite;
    }

    public function setIsFavorite(?bool $isFavorite): self
    {
        $this->isFavorite = $isFavorite;

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(?string $address): self
    {
        $this->address = $address;

        return $this;
    }

    public function getCountry(): ?int
    {
        return $this->country;
    }

    public function setCountry(int $country): self
    {
        $this->country = $country;

        return $this;
    }

    public function getKind(): ?int
    {
        return $this->kind;
    }

    public function setKind(int $kind): self
    {
        $this->kind = $kind;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getCoordinatesExact(): ?string
    {
        return $this->coordinatesExact;
    }

    public function setCoordinatesExact(?string $coordinatesExact): self
    {
        $this->coordinatesExact = $coordinatesExact;

        return $this;
    }

    public function getCoordinatesGeneric(): ?string
    {
        return $this->coordinatesGeneric;
    }

    public function setCoordinatesGeneric(?string $coordinatesGeneric): self
    {
        $this->coordinatesGeneric = $coordinatesGeneric;

        return $this;
    }

    public function getWeb(): ?string
    {
        return $this->web;
    }

    public function setWeb(?string $web): self
    {
        $this->web = $web;

        return $this;
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
            $practica->setLocus($this);
        }

        return $this;
    }

    public function removePractica(Praxis $practica): self
    {
        if ($this->practica->removeElement($practica)) {
            // set the owning side to null (unless already changed)
            if ($practica->getLocus() === $this) {
                $practica->setLocus(null);
            }
        }

        return $this;
    }

    public function __toString(): string
    {
        return json_encode([
            'id' => $this->getId(),
            'name' => $this->getName(),
        ]);
    }
}
