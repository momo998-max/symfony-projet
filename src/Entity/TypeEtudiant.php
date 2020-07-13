<?php

namespace App\Entity;

use App\Repository\TypeEtudiantRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TypeEtudiantRepository::class)
 */
class TypeEtudiant
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $NomTypeEtudiant;


    

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomTypeEtudiant(): ?string
    {
        return $this->NomTypeEtudiant;
    }

    public function setNomTypeEtudiant(string $NomTypeEtudiant): self
    {
        $this->NomTypeEtudiant = $NomTypeEtudiant;

        return $this;
    }

   
}
