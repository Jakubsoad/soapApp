<?php

namespace App\Entity;

use App\Repository\BodyPartRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=BodyPartRepository::class)
 */
class BodyPart
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
     * @ORM\OneToMany(targetEntity=BodySubParts::class, mappedBy="ownerBodyPart")
     */
    private $bodySubParts;

    public function __construct(string $name)
    {
        $this->name = $name;
        $this->bodySubParts = new ArrayCollection();
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

    /**
     * @return Collection|BodySubParts[]
     */
    public function getBodySubParts(): Collection
    {
        return $this->bodySubParts;
    }

    public function addBodySubPart(BodySubParts $bodySubPart): self
    {
        if (!$this->bodySubParts->contains($bodySubPart)) {
            $this->bodySubParts[] = $bodySubPart;
            $bodySubPart->setOwnerBodyPart($this);
        }

        return $this;
    }

    public function removeBodySubPart(BodySubParts $bodySubPart): self
    {
        if ($this->bodySubParts->removeElement($bodySubPart)) {
            // set the owning side to null (unless already changed)
            if ($bodySubPart->getOwnerBodyPart() === $this) {
                $bodySubPart->setOwnerBodyPart(null);
            }
        }

        return $this;
    }
}
