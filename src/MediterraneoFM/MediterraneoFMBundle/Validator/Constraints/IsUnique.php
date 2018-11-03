<?php
namespace MediterraneoFM\MediterraneoFMBundle\Validator\Constraints;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * @Annotation
 */
class IsUnique extends Constraint {
    public $message = 'El valor "%string%" ya existe en la base de datos.';
    protected $class;
    protected $property;

    public function __construct($options) {
    	if(isset($options['class'])):
    		$this->class = $options['class'];
    	else:
    		throw new NotFoundHttpException("La opcion 'class' debe estar configurada en validation.yml");
    	endif;

    	if(isset($options['property'])):
    		$this->property = $options['property'];
    	else:
    		throw new NotFoundHttpException("La opcion 'property' debe estar configurada en validation.yml");
		endif;

    }

    public function validatedBy()
    {
        return 'isUnique';
    }

    public function getClass() {
    	return $this->class;
    }

    public function getProperty() {
    	return $this->property;
    }
}
?>
