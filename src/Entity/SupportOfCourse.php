<?php

namespace App\Entity;

use App\Repository\SupportOfCourseRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SupportOfCourseRepository::class)]
class SupportOfCourse
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $title = null;

    #[ORM\Column(length: 255)]
    private ?string $fichier_url = null;

    #[ORM\ManyToOne(inversedBy: 'supportofcourse')]
    private ?Classes $classes = null;

    /**
     * @var Collection<int, Courses>
     */
    #[ORM\ManyToMany(targetEntity: Courses::class, mappedBy: 'support')]
    private Collection $courses;

    #[ORM\ManyToOne(inversedBy: 'supportOfCourses')]
    private ?Students $student = null;

    /**
     * @var Collection<int, Teachers>
     */
    #[ORM\ManyToMany(targetEntity: Teachers::class, inversedBy: 'supportOfCourses')]
    private Collection $teacher;

    /**
     * @var Collection<int, Classes>
     */
    #[ORM\ManyToMany(targetEntity: Classes::class, inversedBy: 'supportOfCourses')]
    private Collection $Class;

    #[ORM\ManyToOne(inversedBy: 'supportOfCourses')]
    private ?Courses $course = null;

    public function __construct()
    {
        $this->courses = new ArrayCollection();
        $this->teacher = new ArrayCollection();
        $this->Class = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): static
    {
        $this->title = $title;

        return $this;
    }

    public function getFichierUrl(): ?string
    {
        return $this->fichier_url;
    }

    public function setFichierUrl(string $fichier_url): static
    {
        $this->fichier_url = $fichier_url;

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
            $course->addSupport($this);
        }

        return $this;
    }

    public function removeCourse(Courses $course): static
    {
        if ($this->courses->removeElement($course)) {
            $course->removeSupport($this);
        }

        return $this;
    }

    public function getStudent(): ?Students
    {
        return $this->student;
    }

    public function setStudent(?Students $student): static
    {
        $this->student = $student;

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
        }

        return $this;
    }

    public function removeTeacher(Teachers $teacher): static
    {
        $this->teacher->removeElement($teacher);

        return $this;
    }

    /**
     * @return Collection<int, Classes>
     */
    public function getClass(): Collection
    {
        return $this->Class;
    }

    public function addClass(Classes $class): static
    {
        if (!$this->Class->contains($class)) {
            $this->Class->add($class);
        }

        return $this;
    }

    public function removeClass(Classes $class): static
    {
        $this->Class->removeElement($class);

        return $this;
    }

    public function getCourse(): ?Courses
    {
        return $this->course;
    }

    public function setCourse(?Courses $course): static
    {
        $this->course = $course;

        return $this;
    }
}
