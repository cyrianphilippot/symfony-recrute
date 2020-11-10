<?php

namespace UtilisateurBundle\Form;

use PlatformBundle\Form\ImageType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


class UtilisateurType extends AbstractType
{

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
         $builder
             ->add('username')
             ->add('fullname')
             ->add('email')
             ->add('phone')
             ->add('aboutMe')
             ->add('image',ImageType::class)


         ;


    }

    /**
     * {@inheritdoc}
     */
        public function configureOptions(OptionsResolver $resolver)
        {
            $resolver->setDefaults(array(
                'data_class' => 'UtilisateurBundle\Entity\Utilisateur'
            ));
        }

        /**
         * {@inheritdoc}
         */
        public function getBlockPrefix()
        {
            return 'utilisateurbundle_utilisateur';
        }





}
