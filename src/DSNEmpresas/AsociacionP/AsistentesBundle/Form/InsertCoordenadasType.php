<?php

namespace DSNEmpresas\AsociacionP\AsistentesBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class InsertCoordenadasType extends AbstractType {
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    var $fields;

    public function __construct($fields) {
        $this->fields = $fields;
    }

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
            ->add('atributo', 'choice', array(
                'choices' => $this->fields,
                'required' => true,
                'label' => 'Atributo (*)',
            ))
            ->add('cordX', null, array(
                'label' => 'Coordenada X',
                'attr' => array(
                    'placeholder' => 'Ingrese la coordenada X en px(píxeles).', 
                    'maxlength' => 6,
                    "onkeypress" => "return justNumbers(event);",
                    'title' => 'Ingrese X la coordenada en px(píxeles).'
                    )
            ))
            ->add('cordY', null, array(
                'label' => 'Coordenada Y',
                'attr' => array(
                    'placeholder' => 'Ingrese la coordenada Y en px(píxeles).', 
                    'maxlength' => 6, 
                    "onkeypress" => "return justNumbers(event);",
                    'title' => 'Ingrese Y la coordenada en px(píxeles).',
                    )
            ))
            ->add('fuente', 'choice', array(
                'label' => 'Tipo de fuente (*)',
                'choices' => array(
                    'Arial' => 'Arial', 
                    'Arial Black' => 'Arial Black', 
                    'Calibri' => 'Calibri',
                    'Times New Roman' => 'Times New Roman', 
                    'courier' => 'courier', 
                    'sans-serif' => 'sans-serif', 
                    'helvetica' => 'helvetica', 
                    'zapfdingbats' => 'zapfdingbats', 
                    'serif' => 'serif', 
                    'symbol' => 'symbol', 
                    'monospace' => 'monospace', 
                    'fixed' => 'fixed', 
                    'dejavu sans' => 'dejavu sans', 
                    'dejavu sans light' => 'dejavu sans light', 
                    'dejavu sans condensed' => 'dejavu sans condensed', 
                    'dejavu sans mono' => 'dejavu sans mono', 
                    'dejavu serif' => 'dejavu serif', 
                    'dejavu serif condensed' => 'dejavu serif condensed'
                ),
            ))
            ->add('tamano', null, array(
                'required' => true,
                'label' => 'Tamaño (*)',
                'attr' => array('onkeypress' => "return justNumbers(event);", 'max' => 999999, 'min' => 0, 'placeholder' => 'En píxeles(px)')
            ))
            ->add('negrita', 'checkbox', array(
                'required' => false,
            ))
            ->add('cursiva', 'checkbox', array(
                'required' => false,
            ))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'DSNEmpresas\AsociacionP\AsociacionPBundle\Entity\Coordenadas',
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
        return 'dsnempresas_asociacionp_asociacionpbundle_insertcoordenadas';
    }
}
