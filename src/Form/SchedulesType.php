<?php

namespace App\Form;

use App\Entity\Classes;
use App\Entity\Courses;
use App\Entity\Schedules;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SchedulesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('DayWeek', null, [
                'widget' => 'single_text',
            ])
            ->add('beginning', null, [
                'widget' => 'single_text',
            ])
            ->add('ending', null, [
                'widget' => 'single_text',
            ])
            ->add('editable')
            ->add('classes', EntityType::class, [
                'class' => Classes::class,
                'choice_label' => 'id',
            ])
            ->add('class', EntityType::class, [
                'class' => Classes::class,
                'choice_label' => 'id',
            ])
            ->add('cours', EntityType::class, [
                'class' => Courses::class,
                'choice_label' => 'id',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Schedules::class,
        ]);
    }
}
