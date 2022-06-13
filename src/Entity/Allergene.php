<?php

namespace App\Entity;

use App\Repository\AllergeneRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AllergeneRepository::class)]
class Allergene
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $nom;

    #[ORM\OneToMany(mappedBy: 'Userallergene', targetEntity: Userallergene::class)]
    private $userallergenes;

    public function __construct()
    {
        $this->userallergenes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * @return Collection<int, Userallergene>
     */
    public function getUserallergenes(): Collection
    {
        return $this->userallergenes;
    }

    public function addUserallergene(Userallergene $userallergene): self
    {
        if (!$this->userallergenes->contains($userallergene)) {
            $this->userallergenes[] = $userallergene;
            $userallergene->setUserallergene($this);
        }

        return $this;
    }

    public function removeUserallergene(Userallergene $userallergene): self
    {
        if ($this->userallergenes->removeElement($userallergene)) {
            // set the owning side to null (unless already changed)
            if ($userallergene->getUserallergene() === $this) {
                $userallergene->setUserallergene(null);
            }
        }

        return $this;
    }
}
