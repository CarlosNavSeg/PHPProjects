<?php

namespace App\Entity;

use App\Repository\CanalRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CanalRepository::class)]
class Canal
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private ?string $nombre = null;

    #[ORM\Column(nullable: true)]
    private ?int $numerocanal = null;

    #[ORM\Column]
    private ?bool $canalporcable = null;

    #[ORM\ManyToOne(inversedBy: 'canales', targetEntity: Empresa::class)]
    #[ORM\JoinColumn(nullable: false)]
    private ?empresa $id_empresa = null;

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

    public function getNumerocanal(): ?int
    {
        return $this->numerocanal;
    }

    public function setNumerocanal(?int $numerocanal): self
    {
        $this->numerocanal = $numerocanal;

        return $this;
    }

    public function isCanalporcable(): ?bool
    {
        return $this->canalporcable;
    }

    public function setCanalporcable(bool $canalporcable): self
    {
        $this->canalporcable = $canalporcable;

        return $this;
    }

    public function getIdEmpresa(): ?empresa
    {
        return $this->id_empresa;
    }

    public function setIdEmpresa(?empresa $id_empresa): self
    {
        $this->id_empresa = $id_empresa;

        return $this;
    }
}
