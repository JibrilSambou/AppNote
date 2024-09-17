<?php

namespace App\Entity;

use App\Repository\TeachersRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TeachersRepository::class)]
class Teachers
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Name = null;

    #[ORM\Column(length: 255)]
    private ?string $Email = null;

    #[ORM\Column(length: 255)]
    private ?string $Subject = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?User $user = null;

    /**
     * @var Collection<int, Students>
     */
    #[ORM\ManyToMany(targetEntity: Students::class, inversedBy: 'teachers')]
    private Collection $student;

    /**
     * @var Collection<int, Classes>
     */
    #[ORM\ManyToMany(targetEntity: Classes::class, inversedBy: 'teachers')]
    private Collection $classes;

    /**
     * @var Collection<int, Courses>
     */
    #[ORM\ManyToMany(targetEntity: Courses::class, mappedBy: 'teachers')]
    private Collection $courses;

    /**
     * @var Collection<int, Notifications>
     */
    #[ORM\OneToMany(mappedBy: 'teacher', targetEntity: Notifications::class)]
    private Collection $notifications;

    /**
     * @var Collection<int, SupportOfCourse>
     */
    #[ORM\ManyToMany(targetEntity: SupportOfCourse::class, mappedBy: 'teacher')]
    private Collection $supportOfCourses;

    #[ORM\ManyToOne(inversedBy: 'teacher')]
    private ?Schedules $schedules = null;

    /**
     * @var Collection<int, Notes>
     */
    #[ORM\OneToMany(targetEntity: Notes::class, mappedBy: 'teacher')]
    private Collection $notes;

    public function __construct()
    {
        $this->student = new ArrayCollection();
        $this->classes = new ArrayCollection();
        $this->courses = new ArrayCollection();
        $this->notifications = new ArrayCollection();
        $this->supportOfCourses = new ArrayCollection();
        $this->notes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->Name;
    }

    public function setName(string $Name): static
    {
        $this->Name = $Name;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->Email;
    }

    public function setEmail(string $Email): static
    {
        $this->Email = $Email;

        return $this;
    }

    public function getSubject(): ?string
    {
        return $this->Subject;
    }

    public function setSubject(string $Subject): static
    {
        $this->Subject = $Subject;

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

    /**
     * @return Collection<int, Students>
     */
    public function getStudent(): Collection
    {
        return $this->student;
    }

    public function addStudent(Students $student): static
    {
        if (!$this->student->contains($student)) {
            $this->student->add($student);
        }

        return $this;
    }

    public function removeStudent(Students $student): static
    {
        $this->student->removeElement($student);

        return $this;
    }

    /**
     * @return Collection<int, Classes>
     */
    public function getClasses(): Collection
    {
        return $this->classes;
    }

    public function addClass(Classes $class): static
    {
        if (!$this->classes->contains($class)) {
            $this->classes->add($class);
            $class->addTeacher($this);
        }

        return $this;
    }

    public function removeClass(Classes $class): static
    {
        if ($this->classes->removeElement($class)) {
            $class->removeTeacher($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, Courses>
     */
    public function getCourses(): Collection
    {
        return $this->courses;
    }

    public function addCourse(Courses $course): static
    {
        if (!$this->courses->contains($course)) {
            $this->courses->add($course);
            $course->addTeacher($this);
        }

        return $this;
    }

    public function removeCourse(Courses $course): static
    {
        if ($this->courses->removeElement($course)) {
            $course->removeTeacher($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, Notifications>
     */
    public function getNotifications(): Collection
    {
        return $this->notifications;
    }

    public function addNotification(Notifications $notification): static
    {
        if (!$this->notifications->contains($notification)) {
            $this->notifications->add($notification);
            $notification->setTeacher($this);
        }

        return $this;
    }

    public function removeNotification(Notifications $notification): static
    {
        if ($this->notifications->removeElement($notification)) {
            if ($notification->getTeacher() === $this) {
                $notification->setTeacher(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, SupportOfCourse>
     */
    public function getSupportOfCourses(): Collection
    {
        return $this->supportOfCourses;
    }

    public function addSupportOfCourse(SupportOfCourse $supportOfCourse): static
    {
        if (!$this->supportOfCourses->contains($supportOfCourse)) {
            $this->supportOfCourses->add($supportOfCourse);
            $supportOfCourse->addTeacher($this);
        }

        return $this;
    }

    public function removeSupportOfCourse(SupportOfCourse $supportOfCourse): static
    {
        if ($this->supportOfCourses->removeElement($supportOfCourse)) {
            $supportOfCourse->removeTeacher($this);
        }

        return $this;
    }

    public function getSchedules(): ?Schedules
    {
        return $this->schedules;
    }

    public function setSchedules(?Schedules $schedules): static
    {
        $this->schedules = $schedules;

        return $this;
    }

    /**
     * @return Collection<int, Notes>
     */
    public function getNotes(): Collection
    {
        return $this->notes;
    }

    public function addNote(Notes $note): static
    {
        if (!$this->notes->contains($note)) {
            $this->notes->add($note);
            $note->setTeacher($this);
        }

        return $this;
    }

    public function removeNote(Notes $note): static
    {
        if ($this->notes->removeElement($note)) {
            if ($note->getTeacher() === $this) {
                $note->setTeacher(null);
            }
        }

        return $this;
    }
}
