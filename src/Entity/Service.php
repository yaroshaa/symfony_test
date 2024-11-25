<?php

namespace App\Entity;

use App\Repository\ServiceRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ServiceRepository::class)]
class Service
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\OneToOne(inversedBy: 'service', cascade: ['persist', 'remove'])]
    private ?Address $address = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $internet = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $tv = null;

    #[ORM\Column(length: 45, nullable: true)]
    private ?string $ip = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(string $id): static
    {
        $this->id = $id;

        return $this;
    }

    public function getAddress(): ?Address
    {
        return $this->address;
    }

    public function setAddress(?Address $address): static
    {
        $this->address = $address;

        return $this;
    }

    public function getInternet(): ?string
    {
        return $this->internet;
    }

    public function setInternet(?string $internet): static
    {
        $this->internet = $internet;

        return $this;
    }

    public function getTv(): ?string
    {
        return $this->tv;
    }

    public function setTv(?string $tv): static
    {
        $this->tv = $tv;

        return $this;
    }

    public function getIp(): ?string
    {
        return $this->ip;
    }

    public function setIp(?string $ip): static
    {
        $this->ip = $ip;

        return $this;
    }
}
