<?php

namespace App\Entity;

use App\Repository\CommentaireRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CommentaireRepository::class)
 */
class Commentaire
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Post::class, inversedBy="commentaires")
     */
    private $idPost;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $contenu;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $pseudo;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $dateTimeSave;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdPost(): ?post
    {
        return $this->idPost;
    }

    public function setIdPost(?post $idPost): self
    {
        $this->idPost = $idPost;

        return $this;
    }

    public function getContenu(): ?string
    {
        return $this->contenu;
    }

    public function setContenu(string $contenu): self
    {
        $this->contenu = $contenu;

        return $this;
    }

    public function getPseudo(): ?string
    {
        return $this->pseudo;
    }

    public function setPseudo(string $pseudo): self
    {
        $this->pseudo = $pseudo;

        return $this;
    }

    public function getDateTimeSave(): ?\DateTimeInterface
    {
        return $this->dateTimeSave;
    }

    public function setDateTimeSave(?\DateTimeInterface $dateTimeSave): self
    {
        $this->dateTimeSave = $dateTimeSave;

        return $this;
    }
}
