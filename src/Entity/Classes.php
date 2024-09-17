<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ClassesRepository::class)]
class Classes
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Name = null;

    #[ORM\Column(length: 255)]
    private ?string $Level = null;

    /**
     * @var Collection<int, Teachers>
     */
    #[ORM\ManyToMany(targetEntity: Teachers::class, mappedBy: 'classes')]
    private Collection $teachers;

    /**
     * @var Collection<int, Schedules>
     */
    #[ORM\OneToMany(targetEntity: Schedules::class, mappedBy: 'classes')]
    private Collection $schedules;

    // Autres relations et propriétés...

    public function __construct()
    {
        $this->teachers = new ArrayCollection();
        $this->schedules = new ArrayCollection();
    }

    // Méthodes getters et setters existantes...

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
            $schedule->setClasses($this);
        }

        return $this;
    }

    public function removeSchedule(Schedules $schedule): static
    {
        if ($this->schedules->removeElement($schedule)) {
            // set the owning side to null (unless already changed)
            if ($schedule->getClasses() === $this) {
                $schedule->setClasses(null);
            }
        }

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
            $teacher->addClass($this);
        }

        return $this;
    }

    public function removeTeacher(Teachers $teacher): static
    {
        if ($this->teachers->removeElement($teacher)) {
            $teacher->removeClass($this);
        }

        return $this;
    }
}
