<?php

namespace DCS\VATValidatorBundle\Validator\Constraints;

use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 */
class VAT extends Constraint
{
    public $message = 'The value "%value%" is not a valid VAT number.';

    public function validatedBy()
    {
        return 'dcs_vat_validator';
    }
}
