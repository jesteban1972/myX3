<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\KindRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: KindRepository::class)]
#[ORM\Table(name: 'kinds')]
#[ApiResource(
    collectionOperations: [
        'get' => [
            'path' => '/kinds'
        ],
        'post' => [
            'path' => '/kind'
        ]
    ],
    itemOperations: [
        'get' => [
            'path' => '/kind/{id}'
        ],
        'put' => [
            'path' => '/kind/{id}'
        ],
        'delete' => [
            'path' => '/kind/{id}'
        ]
    ]
)]
class Kind
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $name;

    #[ORM\ManyToOne(targetEntity: User::class, inversedBy: 'kinds')]
    #[ORM\JoinColumn(nullable: false)]
    private $user;

    public function getId(): ?int
    {
        return $this->id;
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
            'name' => $this->getName(),
        ]);
    }
}
