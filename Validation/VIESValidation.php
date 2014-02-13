<?php

namespace DCS\VATValidatorBundle\Validation;

class VIESValidation implements ValidationInterface
{
    protected static $wsdl = "http://ec.europa.eu/taxation_customs/vies/checkVatService.wsdl";

    /**
     * @var \SoapClient
     */
    protected $client;

    public function __construct()
    {
        if (!class_exists('SoapClient')) {
			throw new \Exception('The Soap library has to be installed and enabled');
		}

        $this->client = new \SoapClient(self::$wsdl);
    }

    /**
     * {@inheritDoc}
     */
    public function check($vatID)
    {
        $countryCode = substr($vatID, 0, 2);
        $vatNumber = substr($vatID, 2);

        try {
            $result = $this->client->checkVat(array(
                'countryCode' => $countryCode,
                'vatNumber' => $vatNumber,
            ));
            return $result->valid;
        } catch (\SoapFault $e) {
            return false;
        }
    }
}
