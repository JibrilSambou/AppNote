<?php

namespace App\Entity;

use App\Repository\StudentsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: StudentsRepository::class)]
class Students
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $email = null;

    #[ORM\Column(length: 255)]
    private ?string $classeLevel = null;

    #[ORM\Column(length: 255)]
    private ?string $idNumber = null;

    #[ORM\ManyToMany(targetEntity: Teachers::class, mappedBy: 'students')]
    private Collection $teachers;

    #[ORM\ManyToOne(inversedBy: 'students')]
    private ?Classes $classes = null;

    #[ORM\OneToMany(mappedBy: 'student', targetEntity: Notifications::class)]
    private Collection $notifications;

    #[ORM\ManyToMany(targetEntity: Courses::class, mappedBy: 'students')]
    private Collection $courses;

    #[ORM\OneToMany(mappedBy: 'student', targetEntity: SupportOfCourse::class)]
    private Collection $supportOfCourses;

    #[ORM\OneToMany(mappedBy: 'student', targetEntity: Notes::class)]
    private Collection $notes;

    public function __construct()
    {
        $this->teachers = new ArrayCollection();
        $this->notifications = new ArrayCollection();
        $this->courses = new ArrayCollection();
        $this->supportOfCourses = new ArrayCollection();
        $this->notes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getClasseLevel(): ?string
    {
        return $this->classeLevel;
    }

    public function setClasseLevel(string $classeLevel): static
    {
        $this->classeLevel = $classeLevel;

        return $this;
    }

    public function getIdNumber(): ?string
    {
        return $this->idNumber;
    }

    public function setIdNumber(string $idNumber): static
    {
        $this->idNumber = $idNumber;

        return $this;
    }

    /**
     * @return Collection<int, Teachers>
     */
    public function getTeachers(): Collection
    {
        return $this->teachers;
    }

    public function addTeacher(Teachers $teacher): static
    {
        if (!$this->teachers->contains($teacher)) {
            $this->teachers->add($teacher);
            $teacher->addStudent($this);
        }

        return $this;
    }

    public function removeTeacher(Teachers $teacher): static
    {
        if ($this->teachers->removeElement($teacher)) {
            $teacher->removeStudent($this);
        }

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
            $notification->setStudent($this);
        }

        return $this;
    }

    public function removeNotification(Notifications $notification): static
    {
        if ($this->notifications->removeElement($notification)) {
            if ($notification->getStudent() === $this) {
                $notification->setStudent(null);
            }
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
            $course->addStudent($this);
        }

        return $this;
    }

    public function removeCourse(Courses $course): static
    {
        if ($this->courses->removeElement($course)) {
            $course->removeStudent($this);
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
            $supportOfCourse->setStudent($this);
        }

        return $this;
    }

    public function removeSupportOfCourse(SupportOfCourse $supportOfCourse): static
    {
        if ($this->supportOfCourses->removeElement($supportOfCourse)) {
            if ($supportOfCourse->getStudent() === $this) {
                $supportOfCourse->setStudent(null);
            }
        }

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
            $note->setStudent($this);
        }

        return $this;
    }

    public function removeNote(Notes $note): static
    {
        if ($this->notes->removeElement($note)) {
            if ($note->getStudent() === $this) {
                $note->setStudent(null);
            }
        }

        return $this;
    }
}
