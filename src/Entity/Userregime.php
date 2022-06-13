<?php

namespace App\Entity;

use App\Repository\UserregimeRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UserregimeRepository::class)]
class Userregime
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\ManyToOne(targetEntity: Regime::class, inversedBy: 'userregimes')]
    #[ORM\JoinColumn(nullable: false)]
    private $regime;

    #[ORM\ManyToOne(targetEntity: User::class, inversedBy: 'regime')]
    #[ORM\JoinColumn(nullable: false)]
    private $user;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRegime(): ?Regime
    {
        return $this->regime;
    }

    public function setRegime(?Regime $regime): self
    {
        $this->regime = $regime;

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
}
