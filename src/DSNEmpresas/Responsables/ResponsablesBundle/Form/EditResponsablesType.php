<?php

namespace DSNEmpresas\Responsables\ResponsablesBundle\Form;

use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class EditResponsablesType extends AbstractType {
    var $rol;

    public function __construct($rol) {
        $this->rol = $rol;
    }

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $rol = $this->rol;

        $builder
            ->add('nombre', null, array(
                'label' => 'Nombre (*)',
            ))
            ->add('apellido', null, array(
                'label' => 'Apellido (*)',
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
            ->add('telefono_particular', null, array(
                'required' => false,
            ))
            ->add('telefono_comercial', null, array(
                'label' => 'Telefono comercial (*)',
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
            ->add('id_agencia', 'entity', array(
                'class' => 'MediterraneoFM\MediterraneoFMBundle\Entity\Agencias',
                    'property' => 'razonSocial',
                    'query_builder' => function(EntityRepository $er) {
                        return $er->createQueryBuilder('c');
                    },
                    'required' => true,
                    'label' => 'Agencia (*)',
                ));

        if(in_array('ROLE_SUPER_ADMIN', $rol)):
            $builder
                ->add('username', null, array(
                    'label' => 'Usuario (*)',
                    'required' => true,
                ));
        endif;

        $builder->add('oldPassword', 'password', array(
                'mapped' => false,
                'label' => 'Contraseña actual (*)',
                'required' => true,
                'attr' => array('maxlength' => 15),
        ));

        if(in_array('ROLE_SUPER_ADMIN', $rol)):
            $builder->add('password', 'repeated', array(
                    'type' => 'password',
                    'invalid_message' => 'Los campos contraseña deben ser iguales',
                    'required' => false,
                    'label' => 'Cambiar contraseña',
                    'options' => array('attr' => array('maxlength' => 15)),
                    'first_options' => array('label' => 'Nueva contraseña'),
                    'second_options' => array('label' => 'Repetir nueva contraseña'),
                ));
        endif;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'MediterraneoFM\MediterraneoFMBundle\Entity\Responsables',
            'csrf_protection' => false,
            'csrf_field_name' => '_token',
            // a unique key to help generate the secret token
            'intention' => 'task_item',
        ));
    }

    public function getName()
    {
        return 'mediterraneofm_mediterraneofmbundle_editresponsablestype';
    }
}
