<?php
namespace MediterraneoFM\MediterraneoFMBundle\Validator\Constraints;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

class IsUniqueValidator extends ConstraintValidator {
	protected $doctrine;

	public function __construct($doctrine) {
		$this->doctrine = $doctrine;
	}

    public function validate($value, Constraint $constraint) {
    	$class = $this->doctrine->getRepository($constraint->getClass())->findAll();
        $func = 'get' . $constraint->getProperty();

    	foreach($class as $cl):
    		if($cl->$func() == $value): #Controlo que el valor ingresado no esté en la base de datos
    			$this->context->addViolation($constraint->message, array('%string%' => $value));
			endif;
		endforeach;		
    }
}
?>
