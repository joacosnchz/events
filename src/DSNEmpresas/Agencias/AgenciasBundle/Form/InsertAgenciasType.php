<?php

namespace DSNEmpresas\Agencias\AgenciasBundle\Form;

use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class InsertAgenciasType extends AbstractType
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
            ->add('razonSocial', null, array(
                'required' => true,
                'label' => 'Razon Social (*)',
            ))
            ->add('direccion', null, array(
                'label' => 'Direccion (*)',
                'required' => true,
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
            ->add('telefono_particular', null, array(
                'required' => false,
            ))
            ->add('telefono_comercial', null, array(
                'label' => 'Telefono comercial (*)',
                'required' => true,
            ))
            ->add('celular', null, array(
                'required' => false,
            ))
            ->add('email', null, array(
                'required' => true,
                'label' => 'Email (*)',
            ))
            ->add('idComision', 'entity', array(
                'class' => 'MediterraneoFMBundle:Comisiones',
                'property' => 'descripcion',
                'required' => true,
                'label' => 'Comisión (*)',
            ))
            ->add('is_active', 'checkbox', array(
                'label' => 'Activo',
                'required' => false,
            ))
            ->add('imagen', null, array(
                'label' => 'Imagen (*)',
                'required' => true,
            ))
            ->add('membrete', null, array(
                'label' => 'Membrete (*)',
                'required' => true,
            ))
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'MediterraneoFM\MediterraneoFMBundle\Entity\Agencias',
            'csrf_protection' => false,
            'csrf_field_name' => '_token',
            // a unique key to help generate the secret token
            'intention'       => 'task_item',
        ));
    }

    public function getName()
    {
        return 'mediterraneofm_mediterraneofmbundle_insertagenciastype';
    }
}
