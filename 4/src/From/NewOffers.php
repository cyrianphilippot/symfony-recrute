<?php

namespace App\Form;

use App\Entity\Offres;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AddNewOffreType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('first_name')
            ->add('last_name')
            ->add('username')
            ->add('email')

            ->add('titre')
            ->add('description')
            ->add('adresse')
            ->add('codepostal')
            ->add('ville')
            ->add('createdat')
            ->add('updatedat')
            ->add('missionend')
            ->add('contrat')
            ->add('typecontrat')

            ->add('plainPassword', PasswordType)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Offres::class,
        ]);
    }
}
