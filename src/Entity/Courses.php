<?php

namespace App\Entity;

use App\Repository\CoursesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CoursesRepository::class)]
class Courses
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Subject = null;

    #[ORM\ManyToOne(inversedBy: 'course')]
    private ?Teachers $teachers = null;

    #[ORM\ManyToOne(inversedBy: 'course')]
    private ?Classes $classes = null;

    /**
     * @var Collection<int, Notifications>
     */
    #[ORM\OneToMany(targetEntity: Notifications::class, mappedBy: 'cours')]
    private Collection $notifications;

    /**
     * @var Collection<int, Classes>
     */
    #[ORM\OneToMany(targetEntity: Classes::class, mappedBy: 'courses')]
    private Collection $class;

    /**
     * @var Collection<int, Teachers>
     */
    #[ORM\OneToMany(targetEntity: Teachers::class, mappedBy: 'courses')]
    private Collection $teacher;

    /**
     * @var Collection<int, Students>
     */
    #[ORM\ManyToMany(targetEntity: Students::class, inversedBy: 'courses')]
    private Collection $student;

    /**
     * @var Collection<int, SupportOfCourse>
     */
    #[ORM\ManyToMany(targetEntity: SupportOfCourse::class, inversedBy: 'courses')]
    private Collection $support;

    /**
     * @var Collection<int, SupportOfCourse>
     */
    #[ORM\OneToMany(targetEntity: SupportOfCourse::class, mappedBy: 'course')]
    private Collection $supportOfCourses;

    /**
     * @var Collection<int, Schedules>
     */
    #[ORM\OneToMany(targetEntity: Schedules::class, mappedBy: 'cours')]
    private Collection $schedules;

    #[ORM\Column(length: 255)]
    private ?string $statuts = null;

    #[ORM\Column(length: 255)]
    private ?string $status = null;

    public function __construct()
    {
        $this->notifications = new ArrayCollection();
        $this->class = new ArrayCollection();
        $this->teacher = new ArrayCollection();
        $this->student = new ArrayCollection();
        $this->support = new ArrayCollection();
        $this->supportOfCourses = new ArrayCollection();
        $this->schedules = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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
            $notification->setCours($this);
        }

        return $this;
    }

    public function removeNotification(Notifications $notification): static
    {
        if ($this->notifications->removeElement($notification)) {
            // set the owning side to null (unless already changed)
            if ($notification->getCours() === $this) {
                $notification->setCours(null);
            }
        }

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
            $class->setCourses($this);
        }

        return $this;
    }

    public function removeClass(Classes $class): static
    {
        if ($this->class->removeElement($class)) {
            // set the owning side to null (unless already changed)
            if ($class->getCourses() === $this) {
                $class->setCourses(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Teachers>
     */
    public function getTeacher(): Collection
    {
        return $this->teacher;
    }

    public function addTeacher(Teachers $teacher): static
    {
        if (!$this->teacher->contains($teacher)) {
            $this->teacher->add($teacher);
            $teacher->setCourses($this);
        }

        return $this;
    }

    public function removeTeacher(Teachers $teacher): static
    {
        if ($this->teacher->removeElement($teacher)) {
            // set the owning side to null (unless already changed)
            if ($teacher->getCourses() === $this) {
                $teacher->setCourses(null);
            }
        }

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
     * @return Collection<int, SupportOfCourse>
     */
    public function getSupport(): Collection
    {
        return $this->support;
    }

    public function addSupport(SupportOfCourse $support): static
    {
        if (!$this->support->contains($support)) {
            $this->support->add($support);
        }

        return $this;
    }

    public function removeSupport(SupportOfCourse $support): static
    {
        $this->support->removeElement($support);

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
            $supportOfCourse->setCourse($this);
        }

        return $this;
    }

    public function removeSupportOfCourse(SupportOfCourse $supportOfCourse): static
    {
        if ($this->supportOfCourses->removeElement($supportOfCourse)) {
            // set the owning side to null (unless already changed)
            if ($supportOfCourse->getCourse() === $this) {
                $supportOfCourse->setCourse(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Schedules>
     */
    public function getSchedules(): Collection
    {
        return $this->schedules;
    }

    public function addSchedule(Schedules $schedule): static
    {
        if (!$this->schedules->contains($schedule)) {
            $this->schedules->add($schedule);
            $schedule->setCours($this);
        }

        return $this;
    }

    public function removeSchedule(Schedules $schedule): static
    {
        if ($this->schedules->removeElement($schedule)) {
            // set the owning side to null (unless already changed)
            if ($schedule->getCours() === $this) {
                $schedule->setCours(null);
            }
        }

        return $this;
    }

    public function getStatuts(): ?string
    {
        return $this->statuts;
    }

    public function setStatuts(string $statuts): static
    {
        $this->statuts = $statuts;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(string $status): static
    {
        $this->status = $status;

        return $this;
    }
}
