<?php

namespace DCS\VATValidatorBundle\Validation;

interface ValidationInterface
{
    /**
     * Check is valid VAT
     *
     * @param string $vatID
     * @return boolean
     */
    public function check($vatID);
}
