<?php

namespace App\Form;

use App\Entity\Classes;
use App\Entity\Courses;
use App\Entity\Students;
use App\Entity\SupportOfCourse;
use App\Entity\Teachers;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SupportOfCourseType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title')
            ->add('fichier_url')
            ->add('classes', EntityType::class, [
                'class' => Classes::class,
                'choice_label' => 'id',
            ])
            ->add('courses', EntityType::class, [
                'class' => Courses::class,
                'choice_label' => 'id',
                'multiple' => true,
            ])
            ->add('student', EntityType::class, [
                'class' => Students::class,
                'choice_label' => 'id',
            ])
            ->add('teacher', EntityType::class, [
                'class' => Teachers::class,
                'choice_label' => 'id',
                'multiple' => true,
            ])
            ->add('Class', EntityType::class, [
                'class' => Classes::class,
                'choice_label' => 'id',
                'multiple' => true,
            ])
            ->add('course', EntityType::class, [
                'class' => Courses::class,
                'choice_label' => 'id',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => SupportOfCourse::class,
        ]);
    }
}
