<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 * @UniqueEntity(
 *     fields={"username"},
 *     message="Ce login est déjà utilisé."
 * )
 */
class User implements UserInterface
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length (min="3", max="15")
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length (min="3", max="15")
     */
    private $prenom;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length (min="3", max="15")
     */
    private $username;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length (min="3", max="15")
     */
    private $password;

    /**
     * @Assert\Length (min="3", max="15")
     * @Assert\EqualTo(propertyPath="password", message="les deux mots de passe ne sont pas equivalents!")
     */
    private $verificationPassword;


    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $role;

    /**
     * @ORM\OneToMany(targetEntity=Commandes::class, mappedBy="user")
     */
    private $relation;

    public function __construct()
    {
        $this->relation = new ArrayCollection();
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

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getVerificationPassword()
    {
        return $this->verificationPassword;
    }

    /**
     * @param mixed $verificationPassword
     */
    public function setVerificationPassword($verificationPassword): void
    {
        $this->verificationPassword = $verificationPassword;
    }


    public function getRole(): ?string
    {
        return $this->role;
    }

    public function setRole(?string $role): self
    {
        if ($role === null) {
            $this->role = "ROLE_USER";
        } else {
            $this->role = $role;
        }
        return $this;
    }

    /**
     * @return Collection|Commandes[]
     */
    public function getRelation(): Collection
    {
        return $this->relation;
    }

    public function addRelation(Commandes $relation): self
    {
        if (!$this->relation->contains($relation)) {
            $this->relation[] = $relation;
            $relation->setUser($this);
        }

        return $this;
    }

    public function removeRelation(Commandes $relation): self
    {
        if ($this->relation->removeElement($relation)) {
            // set the owning side to null (unless already changed)
            if ($relation->getUser() === $this) {
                $relation->setUser(null);
            }
        }

        return $this;
    }

    public function getRoles()
    {
        return [$this->role];
    }

    public function getSalt()
    {
        // TODO: Implement getSalt() method.
    }

    public function eraseCredentials()
    {
        // TODO: Implement eraseCredentials() method.
    }
}
