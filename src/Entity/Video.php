<?php

namespace App\Entity;

use App\Repository\VideoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: VideoRepository::class)]
class Video
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Title = null;

    #[ORM\Column(length: 255)]
    private ?string $linkVideo = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?Survey $Survey = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->Title;
    }

    public function setTitle(string $Title): static
    {
        $this->Title = $Title;

        return $this;
    }

    public function getLinkVideo(): ?string
    {
        return $this->linkVideo;
    }

    public function setLinkVideo(string $linkVideo): static
    {
        $this->linkVideo = $linkVideo;

        return $this;
    }

    public function getSurvey(): ?Survey
    {
        return $this->Survey;
    }

    public function setSurvey(?Survey $Survey): static
    {
        $this->Survey = $Survey;

        return $this;
    }


}
