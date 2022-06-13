<?php

namespace App\Entity;

use App\Repository\UserallergeneRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UserallergeneRepository::class)]
class Userallergene
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\ManyToOne(targetEntity: Allergene::class, inversedBy: 'userallergenes')]
    private $Userallergene;

    #[ORM\ManyToOne(targetEntity: User::class, inversedBy: 'userallergenes')]
    #[ORM\JoinColumn(nullable: false)]
    private $User;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUserallergene(): ?Allergene
    {
        return $this->Userallergene;
    }

    public function setUserallergene(?Allergene $Userallergene): self
    {
        $this->Userallergene = $Userallergene;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->User;
    }

    public function setUser(?User $User): self
    {
        $this->User = $User;

        return $this;
    }
}
