<?php

namespace Omnipay\KlarnaPayments;

use Omnipay\KlarnaPayments\Traits\GatewayParameters;
use Omnipay\Common\AbstractGateway;

class Gateway extends AbstractGateway
{
    use GatewayParameters;

    public function getName()
    {
        return 'Klarna Payments';
    }

    public function getDefaultParameters()
    {
        return [
            'testMode' => true,
            'username' => '',
            'password' => ''
        ];
    }

    /**
     * Start a new credit session
     */
    public function startCreditSession(array $parameters = [])
    {
        return $this->createRequest('\Omnipay\KlarnaPayments\Message\StartCreditSessionRequest', $parameters);
    }

    /**
     * Create a new order
     */
    public function createOrder(array $parameters = [])
    {
        return $this->createRequest('\Omnipay\KlarnaPayments\Message\CreateOrderRequest', $parameters);
    }
}