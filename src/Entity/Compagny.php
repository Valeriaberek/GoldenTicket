<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\CompagnyRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CompagnyRepository::class)]
#[ApiResource]
class Compagny
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nameCompany = null; // Renommé

    #[ORM\Column(length: 255)]
    private ?string $emailCompany = null; // Renommé

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $videoCompany = null; // Renommé

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $logoCompany = null; // Renommé

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNameCompany(): ?string
    {
        return $this->nameCompany; // Renommé
    }

    public function setNameCompany(string $nameCompany): static // Renommé
    {
        $this->nameCompany = $nameCompany; // Renommé

        return $this;
    }

    public function getEmailCompany(): ?string
    {
        return $this->emailCompany; // Renommé
    }

    public function setEmailCompany(string $emailCompany): static // Renommé
    {
        $this->emailCompany = $emailCompany; // Renommé

        return $this;
    }

    public function getVideoCompany(): ?string
    {
        return $this->videoCompany; // Renommé
    }

    public function setVideoCompany(?string $videoCompany): static // Renommé
    {
        $this->videoCompany = $videoCompany; // Renommé

        return $this;
    }

    public function getLogoCompany(): ?string
    {
        return $this->logoCompany; // Renommé
    }

    public function setLogoCompany(?string $logoCompany): static // Renommé
    {
        $this->logoCompany = $logoCompany; // Renommé

        return $this;
    }
}
