<?php

namespace App\Entity;

use App\Repository\RujukanRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RujukanRepository::class)]
class Rujukan
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'rujukans')]
    private ?Flag $flag = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $nama = null;

    /**
     * @var Collection<int, Task>
     */
    #[ORM\OneToMany(targetEntity: Task::class, mappedBy: 'jawatan')]
    private Collection $tasks;

    /**
     * @var Collection<int, Task>
     */
    #[ORM\OneToMany(targetEntity: Task::class, mappedBy: 'bahagian')]
    private Collection $bahagians;

    /**
     * @var Collection<int, User>
     */
    #[ORM\ManyToMany(targetEntity: User::class, mappedBy: 'permission')]
    private Collection $users;

    public function __construct()
    {
        $this->tasks = new ArrayCollection();
        $this->bahagians = new ArrayCollection();
        $this->users = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFlag(): ?Flag
    {
        return $this->flag;
    }

    public function setFlag(?Flag $flag): static
    {
        $this->flag = $flag;

        return $this;
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
     * @return Collection<int, Task>
     */
    public function getTasks(): Collection
    {
        return $this->tasks;
    }

    public function addTask(Task $task): static
    {
        if (!$this->tasks->contains($task)) {
            $this->tasks->add($task);
            $task->setJawatan($this);
        }

        return $this;
    }

    public function removeTask(Task $task): static
    {
        if ($this->tasks->removeElement($task)) {
            // set the owning side to null (unless already changed)
            if ($task->getJawatan() === $this) {
                $task->setJawatan(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return $this->getNama() ?? "";
    }

    /**
     * @return Collection<int, Task>
     */
    public function getBahagians(): Collection
    {
        return $this->bahagians;
    }

    public function addBahagian(Task $bahagian): static
    {
        if (!$this->bahagians->contains($bahagian)) {
            $this->bahagians->add($bahagian);
            $bahagian->setBahagian($this);
        }

        return $this;
    }

    public function removeBahagian(Task $bahagian): static
    {
        if ($this->bahagians->removeElement($bahagian)) {
            // set the owning side to null (unless already changed)
            if ($bahagian->getBahagian() === $this) {
                $bahagian->setBahagian(null);
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
