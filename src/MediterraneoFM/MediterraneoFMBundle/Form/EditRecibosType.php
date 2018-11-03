<?php

namespace MediterraneoFM\MediterraneoFMBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class EditRecibosType extends AbstractType {
    var $id_ciudad;
    
    public function __construct($id_ciudad) {
        $this->id_ciudad = $id_ciudad;
    }

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
            ->add('nro_recibo', null, array(
                'label' => 'Nro. recibo (*)',
            ))
            ->add('fecha', null, array(
                'format' => 'dd-MM-yyyy',
                'required' => true,
                'label' => 'Fecha (*)',
                'widget' => 'single_text',
                'attr' => array('title' => 'Click sobre el campo para completarlo.'),
            ))
            ->add('nombre', null, array(
                'label' => 'Nombre (*)',
            ))
            ->add('domicilio', null, array(
                'required' => false,
            ))
            ->add('telefono', null, array(
                'required' => false,
            ))
            ->add('id_ciudad', null, array(
                'label' => 'Ciudad (*)',
                'attr' => array('value' => $this->id_ciudad)
            ))
            ->add('iva', 'choice', array(
                'choices' => array('Gravado' => 'Gravado', 'No gravado' => 'No gravado', 'Resp. Inscr.' => 'Resp. Inscr.', 'Exento' => 'Exento', 'No responsable' => 'No responsable', 'Resp. Monotributo' => 'Resp. Monotributo', 'Sujeto No Categ.' => 'Sujeto No Categ.', 'Peq. Cont. Eventual' => 'Peq. Cont. Eventual', 'C. Final' => 'C. Final', 'Monotributista Social' => 'Monotributista Social', 'Peq. Cont. Event. Social' => 'Peq. Cont. Event. Social'),
                'required' => true,
                'label' => 'Iva (*)',
            ))
            ->add('importe', null, array(
                'label' => 'Importe en letras (*)'
            ))
            ->add('concepto', null, array(
                'required' => false,
            ))
            ->add('total', null, array(
                'label' => 'Total (*)',
            ))
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'MediterraneoFM\MediterraneoFMBundle\Entity\Recibos',
            'csrf_protection' => false,
            'csrf_field_name' => '_token',
            // a unique key to help generate the secret token
            'intention'       => 'task_item',
        ));
    }

    public function getName()
    {
        return 'mediterraneofm_mediterraneofmbundle_editrecibostype';
    }
}
