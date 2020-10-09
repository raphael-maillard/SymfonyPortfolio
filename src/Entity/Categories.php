<?php

namespace App\Entity;

use App\Repository\CategoriesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CategoriesRepository::class)
 */
class Categories
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
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $logo;

    /**
     * @ORM\OneToMany(targetEntity=technologies::class, mappedBy="id_category")
     */
    private $id_technologie;

    public function __construct()
    {
        $this->id_technologie = new ArrayCollection();
    }

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

    public function getLogo(): ?string
    {
        return $this->logo;
    }

    public function setLogo(string $logo): self
    {
        $this->logo = $logo;

        return $this;
    }

    /**
     * @return Collection|technologies[]
     */
    public function getIdTechnologie(): Collection
    {
        return $this->id_technologie;
    }

    public function addIdTechnologie(technologies $idTechnologie): self
    {
        if (!$this->id_technologie->contains($idTechnologie)) {
            $this->id_technologie[] = $idTechnologie;
            $idTechnologie->setIdCategory($this);
        }

        return $this;
    }

    public function removeIdTechnologie(technologies $idTechnologie): self
    {
        if ($this->id_technologie->contains($idTechnologie)) {
            $this->id_technologie->removeElement($idTechnologie);
            // set the owning side to null (unless already changed)
            if ($idTechnologie->getIdCategory() === $this) {
                $idTechnologie->setIdCategory(null);
            }
        }

        return $this;
    }
}
