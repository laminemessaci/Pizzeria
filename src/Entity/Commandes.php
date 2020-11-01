<?php

namespace App\Entity;

use App\Repository\CommandesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CommandesRepository::class)
 */
class Commandes
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $ref;

    /**
     * @ORM\Column(type="date")
     */
    private $date;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $statut;

    /**
     * @ORM\ManyToMany(targetEntity=Recette::class, inversedBy="commandes")
     */
    private $relation;

    /**
     * @ORM\ManyToMany(targetEntity=Supplement::class, mappedBy="relation")
     */
    private $supplements;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="relation")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    public function __construct()
    {
        $this->relation = new ArrayCollection();
        $this->supplements = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRef(): ?string
    {
        return $this->ref;
    }

    public function setRef(string $ref): self
    {
        $this->ref = $ref;

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

    public function getStatut(): ?string
    {
        return $this->statut;
    }

    public function setStatut(?string $statut): self
    {
        $this->statut = $statut;

        return $this;
    }

    /**
     * @return Collection|Recette[]
     */
    public function getRelation(): Collection
    {
        return $this->relation;
    }

    public function addRelation(Recette $relation): self
    {
        if (!$this->relation->contains($relation)) {
            $this->relation[] = $relation;
        }

        return $this;
    }

    public function removeRelation(Recette $relation): self
    {
        $this->relation->removeElement($relation);

        return $this;
    }

    /**
     * @return Collection|Supplement[]
     */
    public function getSupplements(): Collection
    {
        return $this->supplements;
    }

    public function addSupplement(Supplement $supplement): self
    {
        if (!$this->supplements->contains($supplement)) {
            $this->supplements[] = $supplement;
            $supplement->addRelation($this);
        }

        return $this;
    }

    public function removeSupplement(Supplement $supplement): self
    {
        if ($this->supplements->removeElement($supplement)) {
            $supplement->removeRelation($this);
        }

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
