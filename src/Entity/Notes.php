<?php

namespace App\Entity;

use App\Repository\NotesRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: NotesRepository::class)]
class Notes
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?float $note = null;

    #[ORM\Column(length: 255)]
    private ?string $subject = null;  // Correction : subject avec un 's' minuscule

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $dateAdded = null;

    #[ORM\ManyToOne(inversedBy: 'notes')]
    private ?Students $student = null;  // Correction : student avec un 's' minuscule

    #[ORM\ManyToOne(inversedBy: 'notes')]
    private ?Teachers $teacher = null;  // Correction : teacher (singulier)

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNote(): ?float
    {
        return $this->note;
    }

    public function setNote(float $note): static
    {
        $this->note = $note;

        return $this;
    }

    public function getSubject(): ?string
    {
        return $this->subject;
    }

    public function setSubject(string $subject): static
    {
        $this->subject = $subject;

        return $this;
    }

    public function getDateAdded(): ?\DateTimeInterface
    {
        return $this->dateAdded;
    }

    public function setDateAdded(\DateTimeInterface $dateAdded): static
    {
        $this->dateAdded = $dateAdded;

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

    public function getTeacher(): ?Teachers  // Correction : getTeacher (singulier)
    {
        return $this->teacher;
    }

    public function setTeacher(?Teachers $teacher): static  // Correction : setTeacher (singulier)
    {
        $this->teacher = $teacher;

        return $this;
    }
}
