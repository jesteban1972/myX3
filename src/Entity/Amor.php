<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\AmorRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AmorRepository::class)]
#[ORM\Table(name: 'amores')]
#[ApiResource]
class Amor
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 510, nullable: true)]
    private $achtung;

    #[ORM\Column(type: 'string', length: 255)]
    private $alias;

    #[ORM\Column(type: 'integer')]
    private $genre;

    #[ORM\Column(type: 'integer')]
    private $rating;

    #[ORM\Column(type: 'boolean', nullable: true)]
    private $favorite;

    #[ORM\Column(type: 'string', length: 510)]
    private $description1;

    #[ORM\Column(type: 'string', length: 510, nullable: true)]
    private $description2;

    #[ORM\Column(type: 'string', length: 510, nullable: true)]
    private $description3;

    #[ORM\Column(type: 'string', length: 510, nullable: true)]
    private $description4;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $web;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $name;

    #[ORM\Column(type: 'boolean')]
    private $photo;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $phone;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $email;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $other;

    #[ORM\Column(type: 'integer')]
    #[ORM\ManyToOne(targetEntity: 'App\Entity\User', inversedBy: 'id')]
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

    public function getAlias(): ?string
    {
        return $this->alias;
    }

    public function setAlias(string $alias): self
    {
        $this->alias = $alias;

        return $this;
    }

    public function getGenre(): ?int
    {
        return $this->genre;
    }

    public function setGenre(int $genre): self
    {
        $this->genre = $genre;

        return $this;
    }

    public function getRating(): ?int
    {
        return $this->rating;
    }

    public function setRating(int $rating): self
    {
        $this->rating = $rating;

        return $this;
    }

    public function isFavorite(): ?bool
    {
        return $this->favorite;
    }

    public function setFavorite(?bool $favorite): self
    {
        $this->favorite = $favorite;

        return $this;
    }

    public function getDescription1(): ?string
    {
        return $this->description1;
    }

    public function setDescription1(string $description1): self
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

    public function getWeb(): ?string
    {
        return $this->web;
    }

    public function setWeb(?string $web): self
    {
        $this->web = $web;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function hasPhoto(): ?bool
    {
        return $this->photo;
    }

    public function setHasPhoto(bool $hasPhoto): self
    {
        $this->photo = $hasPhoto;

        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(string $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getOther(): ?string
    {
        return $this->other;
    }

    public function setOther(string $other): self
    {
        $this->other = $other;

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
