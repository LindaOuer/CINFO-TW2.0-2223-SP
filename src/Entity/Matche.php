<?php

namespace App\Entity;

use App\Repository\MatcheRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MatcheRepository::class)]
class Matche
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $dateM = null;

    #[ORM\Column(length: 255)]
    private ?string $equipe1 = null;

    #[ORM\Column(length: 255)]
    private ?string $equipe2 = null;

    #[ORM\Column]
    private ?int $nbSpectateurs = null;

    #[ORM\ManyToOne(inversedBy: 'matches')]
    private ?Stade $stade = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateM(): ?\DateTimeInterface
    {
        return $this->dateM;
    }

    public function setDateM(\DateTimeInterface $dateM): self
    {
        $this->dateM = $dateM;

        return $this;
    }

    public function getEquipe1(): ?string
    {
        return $this->equipe1;
    }

    public function setEquipe1(string $equipe1): self
    {
        $this->equipe1 = $equipe1;

        return $this;
    }

    public function getEquipe2(): ?string
    {
        return $this->equipe2;
    }

    public function setEquipe2(string $equipe2): self
    {
        $this->equipe2 = $equipe2;

        return $this;
    }

    public function getNbSpectateurs(): ?int
    {
        return $this->nbSpectateurs;
    }

    public function setNbSpectateurs(int $nbSpectateurs): self
    {
        $this->nbSpectateurs = $nbSpectateurs;

        return $this;
    }

    public function getStade(): ?Stade
    {
        return $this->stade;
    }

    public function setStade(?Stade $stade): self
    {
        $this->stade = $stade;

        return $this;
    }
}
