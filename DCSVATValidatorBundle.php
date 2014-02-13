<?php

namespace DCS\VATValidatorBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;
use DCS\VATValidatorBundle\DependencyInjection\DCSVATValidatorExtension;

class DCSVATValidatorBundle extends Bundle
{
    /**
     * {@inheritdoc}
     */
    public function getContainerExtension()
    {
        if (null === $this->extension) {
            return new DCSVATValidatorExtension();
        }

        return $this->extension;
    }
}
