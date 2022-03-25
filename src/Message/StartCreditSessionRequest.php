<?php

namespace Omnipay\KlarnaPayments\Message;

class StartCreditSessionRequest extends BaseRequest
{

    protected function getBaseData(): array
    {
        $data['locale'] = $this->getLocale();
        $data['order_amount'] = $this->getOrderAmount();
        $data['order_tax_amount'] = $this->getOrderTaxAmount();
        $data['order_lines'] = $this->getOrderLines();
        $data['purchase_country'] = $this->getPurchaseCountry();
        $data['purchase_currency'] = $this->getPurchaseCurrency();

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
        $region = $this->getRegion();
        $testMode = $this->getTestMode();
        $base = static::getBaseEndpoint($region, $testMode);
        return $base . 'payments/v1/sessions';
    }

    public function getHttpMethod()
    {
        return 'POST';
    }

    public function getHeaders()
    {
        $auth = base64_encode($this->getKlarnaUsername() . ':' . $this->getKlarnaPassword());

        return [
            'Content-Type' => 'application/json',
            'Authorization' => 'Basic ' . $auth,
        ];
    }
    
    public function sendData($data)
    {
        $response = $this->httpClient->request(
            $this->getHttpMethod(),
            $this->getEndpoint(),
            $this->getHeaders(),
            json_encode($data)
        );
        
        return new StartCreditSessionResponse($this, $response);
    }
}