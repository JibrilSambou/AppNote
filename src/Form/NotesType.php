<?php

namespace App\Form;

use App\Entity\Notes;
use App\Entity\Students;
use App\Entity\Teachers;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class NotesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('note')
            ->add('Subject')
            ->add('dateAdded', null, [
                'widget' => 'single_text',
            ])
            ->add('Student', EntityType::class, [
                'class' => Students::class,
                'choice_label' => 'id',
            ])
            ->add('teachers', EntityType::class, [
                'class' => Teachers::class,
                'choice_label' => 'id',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Notes::class,
        ]);
    }
}
