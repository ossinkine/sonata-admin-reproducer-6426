<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class ChildObject
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=ParentObject::class, inversedBy="childObjects")
     * @ORM\JoinColumn(nullable=false)
     */
    private $parentObject;

    /**
     * @ORM\Column(type = "string")
     */
    private $title;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getParentObject(): ?ParentObject
    {
        return $this->parentObject;
    }

    public function setParentObject(?ParentObject $parentObject): self
    {
        $this->parentObject = $parentObject;

        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(?string $title): self
    {
        $this->title = $title;

        return $this;
    }
}
