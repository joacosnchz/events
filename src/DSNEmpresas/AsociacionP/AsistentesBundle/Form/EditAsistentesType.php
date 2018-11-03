<?php

namespace DSNEmpresas\AsociacionP\AsistentesBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class EditAsistentesType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombre', null, array(
                'label' => 'Nombre (*)',
            ))
            ->add('apellido', null, array(
                'label' => 'Apellido (*)',
            ))
            ->add('fechaNac', null, array(
                'label' => 'Fecha de nacimiento (*)',
                'format' => 'dd-MM-yyyy',
                'widget' => 'single_text',
                'attr' => array('title' => 'Click sobre el campo para completarlo.', 'size' => 6),
            ))
            ->add('dni', null, array(
                'label' => 'DNI (*)',
                'attr' => array('title' => 'Favor de ingresar su nro. de documento SIN PUNTOS.', 'max' => 99999999),
            ))
            ->add('enCalidad', null, array(
                'label' => 'En calidad de (*)',
                'required' => true,
            ))
            ->add('profesion', null, array(
                'label' => 'Profesión (*)',
            ))
            ->add('especialidad', null, array(
                'label' => 'Especialidad (*)',
            ))
            ->add('fechaGrad', null, array(
                'label' => 'Fecha graduación',
                'required' => false,
                'format' => 'dd-MM-yyyy',
                'widget' => 'single_text',
                'attr' => array('title' => 'Click sobre el campo para completarlo.', 'size' => 6),
            ))
            ->add('localidad', null, array(
                'label' => 'Localidad',
                'required' => false,
            ))
            ->add('calle', null, array(
                'label' => 'Domicilio',
                'required' => false,
            ))
            ->add('nroCalle', null, array(
                'label' => 'Numero',
                'required' => false,
            ))
            ->add('piso', null, array(
                'required' => false,
            ))
            ->add('depto', null, array(
                'required' => false,
            ))
            ->add('cp', null, array(
                'label' => 'C.P.',
                'required' => false
            ))
            ->add('telefono', null, array(
                'label' => 'Teléfono',
                'required' => false,
            ))
            ->add('email', null, array(
                'label' => 'Email',
                'required' => false,
            ))
            ->add('asistencia', 'checkbox', array(
                'label' => 'Asistencia (*)',
                'required' => false,
            ));
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'DSNEmpresas\AsociacionP\AsociacionPBundle\Entity\Asistentes',
            'csrf_protection' => false,
            'csrf_field_name' => '_token',
            // a unique key to help generate the secret token
            'intention'       => 'task_item',
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'dsnempresas_asociacionp_asistentesbundle_editasistentes';
    }
}
