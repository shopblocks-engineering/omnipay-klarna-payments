<?php

namespace Omnipay\KlarnaPayments\Message;

use Omnipay\Common\Message\AbstractResponse;
use Omnipay\Common\Message\ResponseInterface;

class CreateOrderResponse extends AbstractResponse implements ResponseInterface
{
    public $response;
    public $request;
    public $responseBody;

    public function __construct($request, $response)
    {
        $this->response = $response;
        $this->request = $request;
        $this->responseBody = json_decode($response->getBody()->getContents());

    }
    

    public function getRequest()
    {
        return $this->request;
    }

    public function getData()
    {
        return $this->responseBody;
    }

    public function getCode()
    {
        return $this->response->getStatusCode();
    }

    public function getMessage()
    {
        if ($this->getCode() === 405){
            //Its likely that the authorisation has expired, restart checkout
            return "Your session may have expired, please restart the checkout process.";
        } elseif ($this->getCode() === 200) {
            return "Order created successfully";
        }
        return "Something went wrong while processing your request, please try again later.";
    }

    public function isCancelled()
    {
        return false;
    }

    /**
     * Get the required redirect method (either GET or POST).
     *
     * @return string
     */
    public function getRedirectMethod()
    {
        return 'INSTANCE';
    }

    public function getResponseBody()
    {
        return $this->responseBody;
    }

    /**
     * Does the response require a redirect?
     *
     * @return boolean
     */
    public function isRedirect()
    {
        return false;
    }

    public function isSuccessful()
    {
        return $this->getCode() == 200;
    }

    public function getTransactionReference()
    {
        return $this->responseBody->order_id ?? null;
    }

    public function getTransactionId(): ?string
    {
        return $this->data['session_id'] ?? null;
    }
}