<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TurnType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $last = method_exists($options['data'], 'getGame') ? $options['data']->getGame()->getLastTurnNumber() : 0;

//        var_dump($options['data']->getGame()->getTurnsAvailable());

        $builder
            ->add('number', null, ['data' => $last + 1])
            ->add('result')
            ->add('idea')
            ->add('plan')
            ->add('action')
            ->add('privacy')
        ;
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Turn'
        ));
    }
}
