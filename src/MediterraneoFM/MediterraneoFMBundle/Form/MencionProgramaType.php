<?php

namespace MediterraneoFM\MediterraneoFMBundle\Form;

use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class MencionProgramaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombre', 'entity', array(
                'class' => 'MediterraneoFM\MediterraneoFMBundle\Entity\MencionPrograma',
                'property' => 'nombre',
                'multiple' => true,
                'expanded' => true,
                'label' => ' ',
            ))
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => null,
        ));
    }

    public function getName()
    {
        return 'mediterraneofm_mediterraneofmbundle_mencionprogramatype';
    }
}
