<?php

namespace App\Entity;

use App\Repository\AssignationRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AssignationRepository::class)]
#[ORM\Table(name: 'assignations')]
class Assignation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\ManyToOne(targetEntity: Amor::class, inversedBy: 'assignations')]
    #[ORM\JoinColumn(nullable: false)]
    private $amor;

    #[ORM\ManyToOne(targetEntity: Praxis::class, inversedBy: 'assignations')]
    #[ORM\JoinColumn(nullable: false)]
    private $praxis;

    #[ORM\ManyToOne(targetEntity: User::class, inversedBy: 'assignations')]
    #[ORM\JoinColumn(nullable: false)]
    private $user;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAmor(): ?Amor
    {
        return $this->amor;
    }

    public function setAmor(?Amor $amor): self
    {
        $this->amor = $amor;

        return $this;
    }

    public function getPraxis(): ?Praxis
    {
        return $this->praxis;
    }

    public function setPraxis(?Praxis $praxis): self
    {
        $this->praxis = $praxis;

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

    public function __toString(): string
    {
        return json_encode([
            'id' => $this->getId(),
            'praxis' => ($this->getPraxis())->getId(),
            'amor' => ($this->getAmor())->getId(),
        ]);
    }
}
