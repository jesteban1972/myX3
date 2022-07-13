<?php

namespace App\Entity;

use App\Repository\KkRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: KkRepository::class)]
class Kk
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'boolean', nullable: true)]
    private $isFavorite;

    #[ORM\Column(type: 'boolean', nullable: true)]
    private $hasPhoto;

    public function getId(): ?int
    {
        return $this->id;
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

    public function isHasPhoto(): ?bool
    {
        return $this->hasPhoto;
    }

    public function setHasPhoto(?bool $hasPhoto): self
    {
        $this->hasPhoto = $hasPhoto;

        return $this;
    }
}
