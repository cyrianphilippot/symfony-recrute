<?php
// src/AppBundle/Form/RegistrationType.php

namespace UtilisateurBundle\Form;

use PlatformBundle\Form\ImageType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProfileType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('fullname')->add('phone')->add('aboutMe')->add('image',ImageType::class);
    }

    public function getParent()
    {
        return 'FOS\UserBundle\Form\Type\ProfileFormType';

    }


    public function getBlockPrefix()
    {
        return 'app_user_profile';
    }

}
