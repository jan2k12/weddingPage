<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\GuestDataRepository")
 */
class GuestData
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;


    /**
     * @ORM\OneToOne(targetEntity="App\Entity\User", inversedBy="guest_data")
     */
    private $user;

    /**
     * @ORM\Column(type="integer")
     */
    private $guests;

    /**
     * @ORM\Column(type="boolean")
     */
    private $confirmed;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $transport;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $allergies;

    /**
     * @ORM\Column(type="integer",options={"default":0})
     */
    private $childsTillThree=0;

    /**
     * @ORM\Column(type="integer",options={"default":0})
     */
    private $childsFourTillNine=0;

    /**
     * @ORM\Column(type="integer",options={"default":0})
     */
    private $childsTenTillFifteen=0;

    /**
     * @return int
     */
    public function getChildsTillThree(): int
    {
        return $this->childsTillThree;
    }

    /**
     * @param int $childsTillThree
     */
    public function setChildsTillThree(int $childsTillThree): void
    {
        $this->childsTillThree = $childsTillThree;
    }

    /**
     * @return int
     */
    public function getChildsFourTillNine(): int
    {
        return $this->childsFourTillNine;
    }

    /**
     * @param int $childsFourTillNine
     */
    public function setChildsFourTillNine(int $childsFourTillNine): void
    {
        $this->childsFourTillNine = $childsFourTillNine;
    }

    /**
     * @return int
     */
    public function getChildsTenTillFifteen(): int
    {
        return $this->childsTenTillFifteen;
    }

    /**
     * @param int $childsTenTillFifteen
     */
    public function setChildsTenTillFifteen(int $childsTenTillFifteen): void
    {
        $this->childsTenTillFifteen = $childsTenTillFifteen;
    }



    public function getId(): ?int
    {
        return $this->id;
    }

    public function getConfirmed(): ?bool
    {
        return $this->confirmed;
    }

    public function setConfirmed(bool $confirmed): self
    {
        $this->confirmed = $confirmed;

        return $this;
    }

    public function getTransport(): ?string
    {
        return $this->transport;
    }

    public function setTransport(string $transport): self
    {
        $this->transport = $transport;

        return $this;
    }

    public function getAllergies(): ?string
    {
        return $this->allergies;
    }

    public function setAllergies(?string $allergies): self
    {
        $this->allergies = $allergies;

        return $this;
    }

    public function getGuests(): ?int
    {
        return $this->guests;
    }

    public function setGuests(int $guests): self
    {
        $this->guests = $guests;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }
}
