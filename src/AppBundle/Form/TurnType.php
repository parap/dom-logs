<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Vich\UploaderBundle\Form\Type\VichFileType;

class TurnType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $last      = $options['data']->getGame()->getLastTurnNumber();
        $available = $options['data']->getGame()->getTurnsAvailable(10);
        $lastIndex = array_flip($available)[$last + 1];
        $new       = is_null($options['data']->getId());

        if ($new) {
            $builder
                ->add('number', ChoiceType::class, ['choices' => array_flip($available), 'choices_as_values' => true, 'data' => $lastIndex]);
        }

        $builder
            ->add('result', null, ['attr' => ['class' => 'tinymce']])
            ->add('idea', null, ['attr' => ['class' => 'tinymce']])
            ->add('plan', null, ['attr' => ['class' => 'tinymce']])
            ->add('action', null, ['attr' => ['class' => 'tinymce']])
            ->add('turnOutFile', VichFileType::class, ['label' => '.trn file', 'required' => false])
            ->add('turnInFile', VichFileType::class, ['label' => '.2h file', 'required' => false])
        ;

        if (!$new) {
            return;
        }

        $builder->add(
            'shareLink',
            ChoiceType::class,
            [
                'choices' => [
                    'No'  => '0',
                    'Yes' => '1',
                ],
                'choices_as_values' => true,
            ]
        );
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
