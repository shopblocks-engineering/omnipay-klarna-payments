<?php

namespace Omnipay\KlarnaPayments\Message;

use Omnipay\Common\Message\AbstractRequest;
use Omnipay\KlarnaPayments\Traits\GatewayParameters;
use Omnipay\Common\Exception\InvalidRequestException;

abstract class BaseRequest extends AbstractRequest
{
    use GatewayParameters;

    static public $liveApiEndpoints = [
        'europe' => 'https://api.klarna.com/',
        'northAmerica' => 'https://api-na.klarna.com/',
        'oceania' => 'https://api-oc.klarna.com/'
    ];

    static public $testApiEndpoints = [
        'europe' => 'https://api.playground.klarna.com/',
        'northAmerica' => 'https://api-na.playground.klarna.com/',
        'oceania' => 'https://api-oc.playground.klarna.com/'
    ];

    static public function getBaseEndpoint($region, $test = false)
    {
        if ($test == 1) {
            return static::$testApiEndpoints[$region];
        } else {
            return static::$liveApiEndpoints[$region]; 
        }
    }
}