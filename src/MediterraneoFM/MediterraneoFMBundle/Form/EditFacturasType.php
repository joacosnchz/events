<?php

namespace MediterraneoFM\MediterraneoFMBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class EditFacturasType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('n_factura')
            ->add('tipo_factura')
            ->add('fecha')
            ->add('nombre')
            ->add('domicilio')
            ->add('id_ciudad')
            ->add('cuit')
            ->add('remito_n')
            ->add('iva')
            ->add('condicion_venta')
            ->add('cantidad')
            ->add('descripcion')
            ->add('p_unitario')
            ->add('p_total')
            ->add('total')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'MediterraneoFM\MediterraneoFMBundle\Entity\Facturas',
            'csrf_protection' => false,
            'csrf_field_name' => '_token',
            // a unique key to help generate the secret token
            'intention'       => 'task_item',
        ));
    }

    public function getName()
    {
        return 'mediterraneofm_mediterraneofmbundle_editfacturastype';
    }
}
