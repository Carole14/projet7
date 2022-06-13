<?php

namespace App\Entity;

use App\Repository\RegimeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RegimeRepository::class)]
class Regime
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $nom;

    #[ORM\OneToMany(mappedBy: 'regime', targetEntity: Userregime::class, orphanRemoval: true)]
    private $userregimes;

    public function __construct()
    {
        $this->userregimes = new ArrayCollection();
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
     * @return Collection<int, Userregime>
     */
    public function getUserregimes(): Collection
    {
        return $this->userregimes;
    }

    public function addUserregime(Userregime $userregime): self
    {
        if (!$this->userregimes->contains($userregime)) {
            $this->userregimes[] = $userregime;
            $userregime->setRegime($this);
        }

        return $this;
    }

    public function removeUserregime(Userregime $userregime): self
    {
        if ($this->userregimes->removeElement($userregime)) {
            // set the owning side to null (unless already changed)
            if ($userregime->getRegime() === $this) {
                $userregime->setRegime(null);
            }
        }

        return $this;
    }
}
