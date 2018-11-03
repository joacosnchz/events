<?php

namespace DSNEmpresas\Responsables\ResponsablesBundle\Form;

use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
# Entities
use MediterraneoFM\MediterraneoFMBundle\Entity\Ciudades;
use MediterraneoFM\MediterraneoFMBundle\Entity\Responsables;

class InsertResponsablesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombre', null, array(
			'label' => 'Nombre (*)',
			'required' => true,		
		))
            ->add('apellido', null, array(
			'label' => 'Apellido (*)',
			'required' => true,		
		))
            ->add('direccion', null, array(
                'required' => false,
            ))
            ->add('id_ciudad', 'entity', array(
                'class' => 'MediterraneoFM\MediterraneoFMBundle\Entity\Ciudades',
                    'property' => 'nombre',
                    'query_builder' => function(EntityRepository $er) {
                        return $er->createQueryBuilder('c');
                    },
                    'required' => true,
                    'label' => 'Zona (*)',
            ))
            ->add('id_agencia', 'entity', array(
                'class' => 'MediterraneoFM\MediterraneoFMBundle\Entity\Agencias',
                    'property' => 'razonSocial',
                    'query_builder' => function(EntityRepository $er) {
                        return $er->createQueryBuilder('c')
                                ->where('c.isActive = :is_active')
                                ->setParameter('is_active', 1);
                    },
                    'required' => true,
                    'label' => 'Agencia (*)',
                    'attr' => array('title' => 'Solo agencias activas.'),
                ))
            ->add('telefono_particular', null, array(
			'label' => 'Teléfono particular',
                        'required' => false,
		))
            ->add('telefono_comercial', null, array(
			'label' => 'Teléfono comercial (*)',
			'required' => true,		
		))
            ->add('celular', null, array(
                'required' => false,
            ))
            ->add('email', null, array(
                'required' => false,
            ))
            ->add('is_active', 'checkbox', array(
                'label' => 'Activo',
                'required' => false,
            ))
            ->add('username', null, array('label' => 'Usuario (*)', 'required' => true))
            ->add('password', 'password', array(
                'label' => 'Contraseña (*)', 
                'required' => true,
                'attr' => array('maxlength' => 15),
            ))
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'MediterraneoFM\MediterraneoFMBundle\Entity\Responsables',
            'csrf_protection' => false,
            'csrf_field_name' => '_token',
            // a unique key to help generate the secret token
            'intention'       => 'task_item',
        ));
    }

    public function getName()
    {
        return 'mediterraneofm_mediterraneofmbundle_insertresponsablestype';
    }
}
