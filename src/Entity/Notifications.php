<?php

namespace App\Entity;

use App\Repository\NotificationsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: NotificationsRepository::class)]
class Notifications
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Title = null;

    #[ORM\Column(length: 255)]
    private ?string $message = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $CreatedAt = null;

    #[ORM\ManyToOne(inversedBy: 'Notification')]
    private ?User $user = null;

    #[ORM\ManyToOne(inversedBy: 'notification')]
    private ?Teachers $teachers = null;

    #[ORM\ManyToOne(inversedBy: 'notification')]
    private ?Classes $classes = null;

    #[ORM\ManyToOne(inversedBy: 'notifications')]
    private ?User $Users = null;

    #[ORM\ManyToOne(inversedBy: 'notifications')]
    private ?Courses $cours = null;

    #[ORM\ManyToOne(inversedBy: 'Teacher')]
    private ?Students $Student = null;

    #[ORM\ManyToOne(inversedBy: 'notifications')]
    private ?Teachers $Teacher = null;

    /**
     * @var Collection<int, Classes>
     */
    #[ORM\OneToMany(targetEntity: Classes::class, mappedBy: 'notifications')]
    private Collection $class;

    public function __construct()
    {
        $this->class = new ArrayCollection();
    }

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

    public function getMessage(): ?string
    {
        return $this->message;
    }

    public function setMessage(string $message): static
    {
        $this->message = $message;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->CreatedAt;
    }

    public function setCreatedAt(\DateTimeImmutable $CreatedAt): static
    {
        $this->CreatedAt = $CreatedAt;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): static
    {
        $this->user = $user;

        return $this;
    }

    public function getTeachers(): ?Teachers
    {
        return $this->teachers;
    }

    public function setTeachers(?Teachers $teachers): static
    {
        $this->teachers = $teachers;

        return $this;
    }

    public function getClasses(): ?Classes
    {
        return $this->classes;
    }

    public function setClasses(?Classes $classes): static
    {
        $this->classes = $classes;

        return $this;
    }

    public function getUsers(): ?User
    {
        return $this->Users;
    }

    public function setUsers(?User $Users): static
    {
        $this->Users = $Users;

        return $this;
    }

    public function getCours(): ?Courses
    {
        return $this->cours;
    }

    public function setCours(?Courses $cours): static
    {
        $this->cours = $cours;

        return $this;
    }

    public function getStudent(): ?Students
    {
        return $this->Student;
    }

    public function setStudent(?Students $Student): static
    {
        $this->Student = $Student;

        return $this;
    }

    public function getTeacher(): ?Teachers
    {
        return $this->Teacher;
    }

    public function setTeacher(?Teachers $Teacher): static
    {
        $this->Teacher = $Teacher;

        return $this;
    }

    /**
     * @return Collection<int, Classes>
     */
    public function getClass(): Collection
    {
        return $this->class;
    }

    public function addClass(Classes $class): static
    {
        if (!$this->class->contains($class)) {
            $this->class->add($class);
            $class->setNotifications($this);
        }

        return $this;
    }

    public function removeClass(Classes $class): static
    {
        if ($this->class->removeElement($class)) {
            // set the owning side to null (unless already changed)
            if ($class->getNotifications() === $this) {
                $class->setNotifications(null);
            }
        }

        return $this;
    }
}
