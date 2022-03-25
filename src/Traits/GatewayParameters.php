<?php

namespace Omnipay\KlarnaPayments\Traits;

trait GatewayParameters
{
    public function getLocale()
    {
        return $this->getParameter('locale');
    }

    public function setLocale($value)
    {
        return $this->setParameter('locale', $value);
    }

    public function getOrderAmount()
    {
        return $this->getParameter('order_amount');
    }

    public function setOrderAmount($value)
    {
        return $this->setParameter('order_amount', $value);
    }

    public function getOrderLines()
    {
        return $this->getParameter('order_lines');
    }

    public function setOrderLines($value)
    {
        return $this->setParameter('order_lines', $value);
    }

    public function getPurchaseCountry()
    {
        return $this->getParameter('purchase_country');
    }

    public function setPurchaseCountry($value)
    {
        return $this->setParameter('purchase_country', $value);
    }

    public function getPurchaseCurrency()
    {
        return $this->getParameter('purchase_currency');
    }

    public function setPurchaseCurrency($value)
    {
        return $this->setParameter('purchase_currency', $value);
    }

    public function getAuthorizationToken()
    {
        return $this->getParameter('authorization_token');
    }

    public function setAuthorizationToken($value)
    {
        return $this->setParameter('authorization_token', $value);
    }

    public function getRegion()
    {
        return $this->getParameter('region');
    }

    public function setRegion($value)
    {
        return $this->setParameter('region', $value);
    }

    public function getTestMode()
    {
        return (bool)$this->getParameter('testMode');
    }

    public function setTestMode($value)
    {
        return $this->setParameter('testMode', $value);
    }

    public function getKlarnaUsername()
    {
        return $this->getParameter('klarna_username');
    }

    public function setKlarnaUsername($value)
    {
        return $this->setParameter('klarna_username', $value);
    }

    public function getKlarnaPassword()
    {
        return $this->getParameter('klarna_password');
    }

    public function setKlarnaPassword($value)
    {
        return $this->setParameter('klarna_password', $value);
    }

    public function getOrderTaxAmount()
    {
        return $this->getParameter('order_tax_amount');
    }

    public function setOrderTaxAmount($value)
    {
        return $this->setParameter('order_tax_amount', $value);
    }
}