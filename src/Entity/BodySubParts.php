<?php


namespace App\Entity;

use App\Repository\BodySubPartsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=BodySubPartsRepository::class)
 */
class BodySubParts
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
     * @ORM\ManyToOne(targetEntity=BodyPart::class, inversedBy="bodySubParts")
     */
    private $ownerBodyPart;

    public function __construct(string $name)
    {
        $this->name = $name;
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

    public function getOwnerBodyPart(): ?BodyPart
    {
        return $this->ownerBodyPart;
    }

    public function setOwnerBodyPart(?BodyPart $ownerBodyPart): self
    {
        $this->ownerBodyPart = $ownerBodyPart;

        return $this;
    }
}
