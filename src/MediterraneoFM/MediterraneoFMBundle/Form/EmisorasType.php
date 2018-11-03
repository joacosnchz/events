<?php

namespace MediterraneoFM\MediterraneoFMBundle\Form;

use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class EmisorasType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombre', 'entity', array(
                    'class' => 'MediterraneoFM\MediterraneoFMBundle\Entity\Emisoras',
                    'property' => 'nombre',
                    'required' => true,
                    'label' => ' ',
                    'expanded' => true,
                    'multiple' => true,
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
        return 'mediterraneofm_mediterraneofmbundle_emisorastype';
    }
}
