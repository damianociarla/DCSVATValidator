<?php

namespace DCS\VATValidatorBundle\Validator\Constraints;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use DCS\VATValidatorBundle\Validation\ValidationInterface;

class VATValidator extends ConstraintValidator
{
    /**
     * @var \DCS\VATValidatorBundle\Validation\ValidationInterface
     */
    protected $validation;

    public function __construct(ValidationInterface $validation)
    {
        $this->validation = $validation;
    }

    public function validate($value, Constraint $constraint)
    {
        if (empty($value) || $this->validation->check($value)) {
            return true;
        }

        $this->context->addViolation($constraint->message, array('%value%' => $value));
        return false;
    }
}
