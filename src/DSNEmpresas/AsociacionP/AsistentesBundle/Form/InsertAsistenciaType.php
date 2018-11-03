<?php

namespace DSNEmpresas\AsociacionP\AsistentesBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class InsertAsistenciaType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('dni', null, array(
                'label' => 'DNI (*)',
                'attr' => array('maxlength' => 8, 'title' => 'Favor de ingresar el nro. de documento SIN PUNTOS.')
            ))
            ->add('asistencia', null, array(
                'label' => 'Asitencia',
                'data' => true,
            ))
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
        return 'dsnempresas_asociacionp_asistentesbundle_insertasistencia';
    }
}
