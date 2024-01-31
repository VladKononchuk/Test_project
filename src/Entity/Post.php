<?php

namespace App\Entity;

use App\Repository\Post\PostRepository;
use App\ValueObject\Description;
use App\ValueObject\Name;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PostRepository::class)]
class Post
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private int $id;

    #[ORM\Column]
    private string $name;

    #[ORM\Column]
    private string $description;

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setId(string $id): void
    {
        $this->id = $id;
    }

    public function setName(Name $name): void
    {
        $this->name = $name->value;
    }

    public function setDescription(Description $description): void
    {
        $this->description = $description->value;
    }
}
