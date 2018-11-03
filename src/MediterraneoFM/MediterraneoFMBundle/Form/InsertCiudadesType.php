<?php

namespace MediterraneoFM\MediterraneoFMBundle\Form;

use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class InsertCiudadesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombre', null, array(
                'required' => true,
                'label' => 'Nombre (*)',
            ))
            ->add('id_provincia', 'entity', array(
                'class' => 'MediterraneoFM\MediterraneoFMBundle\Entity\Provincias',
                    'property' => 'nombre',
                    'query_builder' => function(EntityRepository $er) {
                        return $er->createQueryBuilder('c');
                    },
                    'required' => true,
                    'label' => 'Provincia (*)',
                ))
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'MediterraneoFM\MediterraneoFMBundle\Entity\Ciudades',
            'csrf_protection' => false,
            'csrf_field_name' => '_token',
            // a unique key to help generate the secret token
            'intention' => 'task_item',
        ));
    }

    public function getName()
    {
        return 'mediterraneofm_mediterraneofmbundle_insertciudadestype';
    }
}
