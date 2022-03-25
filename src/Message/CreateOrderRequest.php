<?php

namespace Omnipay\KlarnaPayments\Message;

class CreateOrderRequest extends BaseRequest
{
    protected function getBaseData(): array
    {
        $data['locale'] = $this->getLocale();
        $data['order_amount'] = $this->getOrderAmount();
        $data['order_tax_amount'] = $this->getOrderTaxAmount();
        $data['order_lines'] = $this->getOrderLines();
        $data['purchase_country'] = $this->getPurchaseCountry();
        $data['purchase_currency'] = $this->getPurchaseCurrency();
        $data['authorization_token']= $this->getAuthorizationToken();

        return $data;
    }

    /**
     * @inherit
     */
    public function getData()
    {
        $data = $this->getBaseData();
        return $data;
    }

    public function getEndpoint()
    {
        return static::$testApiEndpoints['europe'];
    }

    public function getHttpMethod()
    {
        return 'POST';
    }

    public function getHeaders()
    {
        return [
            'Content-Type' => 'application/json',
            'Authorization' => 'Basic ' . base64_encode('PK52581_03b37d2a1ef4:O6uVv13HPS5v0dOT'),
        ];
    }
    
    public function sendData($data)
    {
        $response = $this->httpClient->request(
            $this->getHttpMethod(),
            $this->getEndpoint() . 'payments/v1/authorizations/' . $data['authorization_token'] . '/order',
            $this->getHeaders(),
            json_encode($data)
        );

        return new CreateOrderResponse($this, $response);
    }
}