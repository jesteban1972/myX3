<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\PraxisRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PraxisRepository::class)]
#[ORM\Table(name: 'practica')]
#[ApiResource]
class Praxis
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

    #[ORM\Column(type: 'integer')]
    #[ORM\OneToOne(targetEntity: 'Locus')]
    private $locus;

    #[ORM\Column(type: 'date')]
    private $date;

    #[ORM\Column(type: 'string', length: 2, nullable: true)]
    private $ordinal;

    #[ORM\Column(type: 'text', nullable: true)]
    private $description;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $tq;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $tl;

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

    public function setRating(int $rating): self
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

    public function getLocus(): ?int
    {
        return $this->locus;
    }

    public function setLocus(int $locus): self
    {
        $this->locus = $locus;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getOrdinal(): ?string
    {
        return $this->ordinal;
    }

    public function setOrdinal(?string $ordinal): self
    {
        $this->ordinal = $ordinal;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->descr = $description;

        return $this;
    }

    public function getTq(): ?int
    {
        return $this->tq;
    }

    public function setTq(?int $tq): self
    {
        $this->tq = $tq;

        return $this;
    }

    public function getTl(): ?int
    {
        return $this->tl;
    }

    public function setTl(?int $tl): self
    {
        $this->tl = $tl;

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
