<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class ParentObject
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToMany(targetEntity=ChildObject::class, mappedBy="parentObject", cascade={"persist", "remove"}, orphanRemoval=true)
     */
    private $childObjects;

    public function __construct()
    {
        $this->childObjects = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection|ChildObject[]
     */
    public function getChildObjects(): Collection
    {
        return $this->childObjects;
    }

    public function addChildObject(ChildObject $childObject): self
    {
        if (!$this->childObjects->contains($childObject)) {
            $this->childObjects[] = $childObject;
            $childObject->setParentObject($this);
        }

        return $this;
    }

    public function removeChildObject(ChildObject $childObject): self
    {
        if ($this->childObjects->contains($childObject)) {
            $this->childObjects->removeElement($childObject);
            // set the owning side to null (unless already changed)
            if ($childObject->getParentObject() === $this) {
                $childObject->setParentObject(null);
            }
        }

        return $this;
    }
}
