<?php

namespace MediterraneoFM\MediterraneoFMBundle\Form;

use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class InsertFacturasType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('n_factura', null, array(
                'label' => 'N°'
            ))
            ->add('tipo_factura', 'choice', array(
                'choices' => array('A' => 'A', 'B' => 'B', 'C' => 'C'),
                'required' => false,
            ))
            ->add('fecha', null, array(
                'label' => 'Fecha (*)',
                'required' => true,
                'format' => 'dd-MM-yyyy',
                'widget' => 'single_text',
                'attr' => array('title' => 'Click sobre el campo para completarlo.'),
            ))
            ->add('nombre', null, array(
                'label' => 'Nombre (*)',
                'required' => true,
            ))
            ->add('domicilio', null, array(
                'required' => false,
            ))
            ->add('id_ciudad', 'entity', array(
                'class' => 'MediterraneoFM\MediterraneoFMBundle\Entity\Ciudades',
                    'property' => 'nombre',
                    'query_builder' => function(EntityRepository $er) {
                        return $er->createQueryBuilder('c');
                    },
                    'required' => true,
                    'label' => 'Ciudad (*)',
                ))
            /* ->add('id_ciudad', null, array(
                'required' => true,
                'label' => 'Ciudad (*)'
            )) */
            ->add('cuit', null, array(
                'required' => false,
            ))
            ->add('remito_n', null, array(
                'label' => 'N° remito',
                'required' => false,
            ))
            ->add('iva', 'choice', array(
                'choices' => array('Resp. Inscr.' => 'Resp. Inscr.', 'Consumidor final' => 'Consumidor final', 'Excento/No gravado' => 'Excento/No gravado', 'Import/Export' => 'Import/Export', 'Resp. Monotributo' => 'Resp. Monotributo', 'No categorizada' => 'No categorizada'),
                'required' => false,
            ))
            ->add('condicion_venta', 'choice', array(
                'choices' => array('Contado' => 'Contado', 'Cuenta corriente' => 'Cuenta corriente'),
                'label' => 'Condición de vta. (*)',
                'required' => true,
            ))
            ->add('cantidad', null, array(
                'label' => 'Cantidad (*)',
                'required' => true,
                'attr' => array('title' => 'En caso de ingresar varios productos, separe las cantidades por coma (,).'),
            ))
            ->add('descripcion', null, array(
                'label' => 'Descripcion (*)',
                'required' => true,
                'attr' => array('title' => 'En caso de ingresar varios productos, separe las descripciones por coma (,).'),
            ))
            /* ->add('descripcion', 'collection', array(
                'type' => 'text',
                'allow_add' => true,
                'prototype' => true,
                'allow_delete' => true,
                'options' => array(
                    'required' => true,
                    
                )
            )) */
            ->add('p_unitario', null, array(
                'label' => 'Precio unitario (*)',
                'required' => true,
                'attr' => array('title' => 'En caso de ingresar varios productos, separe los precios por coma (,).'),
            ))
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'MediterraneoFM\MediterraneoFMBundle\Entity\Facturas',
            'csrf_protection' => false,
            'csrf_field_name' => '_token',
            // a unique key to help generate the secret token
            'intention' => 'task_item',
        ));
    }

    public function getName()
    {
        return 'mediterraneofm_mediterraneofmbundle_insertfacturastype';
    }
}
