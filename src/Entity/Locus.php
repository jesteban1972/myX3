<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\LocusRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LocusRepository::class)]
#[ORM\Table(name: 'loca')]
#[ApiResource]
class Locus
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 510, nullable: true)]
    private $achtung;

    #[ORM\Column(type: 'string', length: 255)]
    private $name;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $rating;

    #[ORM\Column(type: 'boolean', nullable: true)]
    private $isFavorite;

    #[ORM\Column(type: 'string', length: 510, nullable: true)]
    private $address;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $country;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $kind;

    #[ORM\Column(type: 'text', nullable: true)]
    private $description;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $coordinatesExact;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $coordinatesGeneric;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $web;

    #[ORM\Column(type: 'integer')]
    //#[ORM\ManyToOne(targetEntity: 'App\Entity\User', inversedBy: 'id')]
    private $user;

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
        return $this->favorite;
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

    public function setCountry(?int $country): self
    {
        $this->country = $country;

        return $this;
    }

    public function getKind(): ?int
    {
        return $this->kind;
    }

    public function setKind(?int $kind): self
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

    public function getUser(): ?int
    {
        return $this->user;
    }

    public function setUser(int $user): self
    {
        $this->user = $user;

        return $this;
    }
}
