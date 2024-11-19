<?php

namespace App\Entity;

use App\Repository\FlagRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FlagRepository::class)]
class Flag
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $nama = null;

    /**
     * @var Collection<int, Rujukan>
     */
    #[ORM\OneToMany(targetEntity: Rujukan::class, mappedBy: 'flag')]
    private Collection $rujukans;

    /**
     * @var Collection<int, User>
     */
    #[ORM\ManyToMany(targetEntity: User::class, mappedBy: 'permission')]
    private Collection $users;

    public function __construct()
    {
        $this->rujukans = new ArrayCollection();
        $this->users = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNama(): ?string
    {
        return $this->nama;
    }

    public function setNama(?string $nama): static
    {
        $this->nama = $nama;

        return $this;
    }

    /**
     * @return Collection<int, Rujukan>
     */
    public function getRujukans(): Collection
    {
        return $this->rujukans;
    }

    public function addRujukan(Rujukan $rujukan): static
    {
        if (!$this->rujukans->contains($rujukan)) {
            $this->rujukans->add($rujukan);
            $rujukan->setFlag($this);
        }

        return $this;
    }

    public function removeRujukan(Rujukan $rujukan): static
    {
        if ($this->rujukans->removeElement($rujukan)) {
            // set the owning side to null (unless already changed)
            if ($rujukan->getFlag() === $this) {
                $rujukan->setFlag(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, User>
     */
    public function getUsers(): Collection
    {
        return $this->users;
    }

    public function addUser(User $user): static
    {
        if (!$this->users->contains($user)) {
            $this->users->add($user);
            $user->addPermission($this);
        }

        return $this;
    }

    public function removeUser(User $user): static
    {
        if ($this->users->removeElement($user)) {
            $user->removePermission($this);
        }

        return $this;
    }
}
