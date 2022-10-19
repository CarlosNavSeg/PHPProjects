<?php

namespace App\Entity;

use App\Repository\EmpresaRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EmpresaRepository::class)]
class Empresa
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private ?string $nombre = null;

    #[ORM\Column(length: 12)]
    private ?string $cif = null;

    #[ORM\OneToMany(mappedBy: 'id_empresa', targetEntity: Canal::class)]
    private Collection $canales;

    public function __construct()
    {
        $this->canales = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getCif(): ?string
    {
        return $this->cif;
    }

    public function setCif(string $cif): self
    {
        $this->cif = $cif;

        return $this;
    }

    /**
     * @return Collection<int, Canal>
     */
    public function getCanales(): Collection
    {
        return $this->canales;
    }

    public function addCanale(Canal $canale): self
    {
        if (!$this->canales->contains($canale)) {
            $this->canales->add($canale);
            $canale->setIdEmpresa($this);
        }

        return $this;
    }

    public function removeCanale(Canal $canale): self
    {
        if ($this->canales->removeElement($canale)) {
            // set the owning side to null (unless already changed)
            if ($canale->getIdEmpresa() === $this) {
                $canale->setIdEmpresa(null);
            }
        }

        return $this;
    }
}
