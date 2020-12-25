<?php

namespace App\Entity;

use App\Repository\ContactRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ContactRepository::class)
 */
class Contact
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=150, nullable=true)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $prenom;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $telephone;

    /**
     * @ORM\Column(type="string", length=150, nullable=true)
     */
    private $email;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $adresse_num;

    /**
     * @ORM\Column(type="string", length=60, nullable=true)
     */
    private $adresse_voie_type;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $adresse_voie;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $adresse_cp;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $adresse_ville;

    /**
     * @ORM\Column(type="string", length=150, nullable=true)
     */
    private $adresse_pays;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="contacts")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(?string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(?string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(?string $telephone): self
    {
        $this->telephone = $telephone;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getAdresseNum(): ?int
    {
        return $this->adresse_num;
    }

    public function setAdresseNum(?int $adresse_num): self
    {
        $this->adresse_num = $adresse_num;

        return $this;
    }

    public function getAdresseVoieType(): ?string
    {
        return $this->adresse_voie_type;
    }

    public function setAdresseVoieType(?string $adresse_voie_type): self
    {
        $this->adresse_voie_type = $adresse_voie_type;

        return $this;
    }

    public function getAdresseVoie(): ?string
    {
        return $this->adresse_voie;
    }

    public function setAdresseVoie(?string $adresse_voie): self
    {
        $this->adresse_voie = $adresse_voie;

        return $this;
    }

    public function getAdresseCp(): ?int
    {
        return $this->adresse_cp;
    }

    public function setAdresseCp(?int $adresse_cp): self
    {
        $this->adresse_cp = $adresse_cp;

        return $this;
    }

    public function getAdresseVille(): ?string
    {
        return $this->adresse_ville;
    }

    public function setAdresseVille(?string $adresse_ville): self
    {
        $this->adresse_ville = $adresse_ville;

        return $this;
    }

    public function getAdressePays(): ?string
    {
        return $this->adresse_pays;
    }

    public function setAdressePays(?string $adresse_pays): self
    {
        $this->adresse_pays = $adresse_pays;

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
