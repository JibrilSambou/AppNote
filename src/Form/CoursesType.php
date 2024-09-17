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

class CoursesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('Subject')
            ->add('statuts')
            ->add('status')
            ->add('teachers', EntityType::class, [
                'class' => Teachers::class,
                'choice_label' => 'id',
            ])
            ->add('classes', EntityType::class, [
                'class' => Classes::class,
                'choice_label' => 'id',
            ])
            ->add('student', EntityType::class, [
                'class' => Students::class,
                'choice_label' => 'id',
                'multiple' => true,
            ])
            ->add('support', EntityType::class, [
                'class' => SupportOfCourse::class,
                'choice_label' => 'id',
                'multiple' => true,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Courses::class,
        ]);
    }
}
