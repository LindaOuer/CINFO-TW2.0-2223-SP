<?php

namespace App\Form;

use App\Entity\Matche;
use App\Entity\Stade;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MatcheType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('dateM')
            ->add('equipe1')
            ->add('equipe2')
            ->add('nbSpectateurs')
            ->add('stade', EntityType::class, [
                'class' => Stade::class,
                'choice_label' => 'nom',
                'placeholder' => 'Choisir un stade',
                'required' => true,
                ])
            ->add('Save', SubmitType::class);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Matche::class,
        ]);
    }
}
