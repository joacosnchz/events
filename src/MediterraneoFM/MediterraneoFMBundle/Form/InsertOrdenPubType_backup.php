<?php

namespace MediterraneoFM\MediterraneoFMBundle\Form;

use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use DSNEmpresas\Pautas\PautasBundle\Form\ShowPautasType;

class InsertOrdenPubType extends AbstractType {
    var $id_agencia;
    var $id_tarifa;
    var $rol;
    
    public function __construct($id_agencia, $id_tarifa, $rol) {
        $this->id_agencia = $id_agencia;
        $this->id_tarifa = $id_tarifa;
        $this->rol = $rol;
    }

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $id_agencia = $this->id_agencia;
        $id_tarifa = $this->id_tarifa;
        $rol = $this->rol;

        if(in_array('ROLE_ADMIN', $rol)):
            $builder->add('id_cliente', 'entity', array(
                'class' => 'MediterraneoFM\MediterraneoFMBundle\Entity\Clientes',
                'property' => 'nomappraziva',
                'query_builder' => function(EntityRepository $er) use ($id_agencia) {
                    return $er->createQueryBuilder('n')
                            ->where('n.isActive = :is_active')
                            ->setParameter('is_active', 1);
                },
                'required' => true,
                'label' => 'Cliente (*)',
                'attr' => array('title' => 'Solo clientes activos.')
            ))
            ->add('id_tarifa', null, array(
                'label' => 'Tarifas (*)',
            ))
            /* ->add('id_tarifa', 'choice', array(
                        'choices' => $id_tarifa,
                        'multiple' => true,
                        "attr" => array("style" => 'width:400px;', "size" => 6, 'title' => 'Solo tarifas vigentes.'),
                        'label' => 'Tarifa (*)',
                    )) */
            ;
        else:
            $builder->add('id_cliente', 'entity', array(
                'class' => 'MediterraneoFM\MediterraneoFMBundle\Entity\Clientes',
                'property' => 'nomappraziva',
                'query_builder' => function(EntityRepository $er) use ($id_agencia) {
                    return $er->createQueryBuilder('n')
                            ->where('n.isActive = :is_active')
                            ->setParameter('is_active', 1)
                            ->andWhere('n.id_agencia = :id_agencia')
                            ->setParameter('id_agencia', $id_agencia);
                },
                'required' => true,
                'label' => 'Cliente (*)',
                'attr' => array('title' => 'Solo clientes activos y de la misma agencia actual.')
            ))
            ->add('id_tarifa', null, array(
                'label' => 'Tarifas (*)',
            ))
            /* ->add('id_tarifa', 'choice', array(
                        'choices' => $id_tarifa,
                        'multiple' => true,
                        "attr" => array("style" => 'width:400px;', "size" => 6, 'title' => 'Solo tarifas vigentes y de emisoras de la misma ciudad que la agencia.'),
                        'label' => 'Tarifa (*)',
                )) */
            ;
        endif;
        
        $builder->add('texto_publicidad', 'textarea', array(
                    'label' => 'Texto publicidad (*)',
                    'required' => true,
                    "attr" => array("cols" => 50, "rows" => 8, "placeholder" => 'Ingrese aquí el texto que dirá el locutor.')
                    ))
                ->add('horario', 'time', array(
                    'label' => 'Horario (*)',
                    'required' => true,
                    'with_seconds' => true
                ))
                ->add('observaciones', 'textarea', array(
                    'required' => false,
                    'attr' => array("cols" => 50, "rows" => 8, "placeholder" => "Ingrese aquí alguna observación a ser tenida en cuenta por el locutor.")
                ))
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'MediterraneoFM\MediterraneoFMBundle\Entity\OrdenPub',
            'csrf_protection' => false,
            'csrf_field_name' => '_token',
            // a unique key to help generate the secret token
            'intention' => 'task_item',
        ));
    }

    public function getName() {
        return 'mediterraneofm_mediterraneofmbundle_insertordenpubtype';
    }

}
