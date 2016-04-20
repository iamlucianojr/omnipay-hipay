<?php

namespace Omnipay\Hipay\Message;

use Omnipay\Common\Message\AbstractRequest;

class Request extends AbstractRequest
{
    const API_VERSION = '';

    protected $liveEndpoint = '';
    protected $testEndpoint = 'https://stage-secure-gateway.hipay-tpp.com/rest/v1';

    protected function getEndpoint()
    {
        return $this->getTestMode() ? $this->testEndpoint : $this->liveEndpoint;
    }

    public function sendData($data)
    {
        $url = $this->getEndpoint().'/hpayment';
        $httpResponse = $this->httpClient->post($url, array('body' => $data, 'headers' => array('Accept' => 'application/json'), 'auth' => array($this->getUsername(), $this->getPassword())));

        return $this->createResponse($httpResponse->json());
    }

    public function getData()
    {
        $data = array(
            'orderid' => $this->getOrderId(),
            'operation' => $this->getOperation(),
            'description' => $this->getDescription(),
            'amount' => $this->getAmount(),
            'currency' => $this->getCurrency(),
            'language' => $this->getLanguage(),
            'email' => $this->getEmail(),
            'cid' => $this->getCid(),
            'authentication_indicator' => $this->getAuthenticationIndicator(),
            'accept_url' => $this->getAcceptUrl(),
            'decline_url' => $this->getDeclineUrl(),
            'pending_url' => $this->getPendingUrl(),
            'exception_url' => $this->getExceptionUrl(),
            'cancel_url' => $this->getCancelUrl(),
            'payment_product_list' => $this->getPaymentProductList(),
            'css' => $this->getCss(),
            'template' => $this->getTemplate(),
            'merchant_display_name' => $this->getMerchantDisplayName(),
            'display_selector' => $this->getDisplaySelector(),
            'firstname' => $this->getFirstName(),
            'lastname' => $this->getLastName(),
        );

        return $data;
    }

    protected function createResponse($data)
    {
        return $this->response = new Response($this, $data);
    }

    public function setOrderId($orderId)
    {
        $this->setParameter('orderid', $orderId);
    }

    public function getOrderId()
    {
        return $this->getParameter('orderid');
    }

    public function setOperation($operation)
    {
        $this->setParameter('operation', $operation);
    }

    public function getOperation()
    {
        return $this->getParameter('operation');
    }

    public function setDescription($description)
    {
        $this->setParameter('description', $description);
    }

    public function getDescription()
    {
        return $this->getParameter('description');
    }

    public function setLanguage($language)
    {
        $this->setParameter('language', $language);
    }

    public function getLanguage()
    {
        return $this->getParameter('language');
    }

    public function setEmail($email)
    {
        $this->setParameter('email', $email);
    }

    public function getEmail()
    {
        return $this->getParameter('email');
    }

    public function setCid($cid)
    {
        $this->setParameter('cid', $cid);
    }

    public function getCid()
    {
        return $this->getParameter('cid');
    }

    public function setAuthenticationIndicator($ai)
    {
        $this->setParameter('authentication_indicator', $ai);
    }

    public function getAuthenticationIndicator()
    {
        return $this->getParameter('authentication_indicator');
    }

    public function setAcceptUrl($url)
    {
        $this->setParameter('accept_url', $url);
    }

    public function getAcceptUrl()
    {
        return $this->getParameter('accept_url');
    }

    public function setDeclineUrl($url)
    {
        $this->setParameter('decline_url', $url);
    }

    public function getDeclineUrl()
    {
        return $this->getParameter('decline_url');
    }

    public function setPendingUrl($url)
    {
        $this->setParameter('pending_url', $url);
    }

    public function getPendingUrl()
    {
        return $this->getParameter('pending_url');
    }

    public function setExceptionUrl($url)
    {
        $this->setParameter('exception_url', $url);
    }

    public function getExceptionUrl()
    {
        return $this->getParameter('exception_url');
    }

    public function setPaymentProductList($products)
    {
        $this->setParameter('payment_product_list', $products);
    }

    public function getPaymentProductList()
    {
        return $this->getParameter('payment_product_list');
    }

    public function setCss($url_css)
    {
        $this->setParameter('css', $url_css);
    }

    public function getCss()
    {
        return $this->getParameter('css');
    }

    public function setTemplate($template)
    {
        $this->setParameter('template', $template);
    }

    public function getTemplate()
    {
        return $this->getParameter('template');
    }

    public function setMerchantDisplayName($merchantDisplayName)
    {
        return $this->setParameter('merchant_display_name', $merchantDisplayName);
    }

    public function getMerchantDisplayName()
    {
        return $this->getParameter('merchant_display_name');
    }

    public function setDisplaySelector($displaySelector)
    {
        return $this->setParameter('display_selector', $displaySelector);
    }

    public function getDisplaySelector()
    {
        return $this->getParameter('display_selector');
    }

    public function setFirstName($firstName)
    {
        return $this->setParameter('firstname', $firstName);
    }

    public function getFirstName()
    {
        return $this->getParameter('firstname');
    }

    public function setLastName($lastname)
    {
        return $this->setParameter('lastname', $lastname);
    }

    public function getLastName()
    {
        return $this->getParameter('lastname');
    }

    public function getPassword()
    {
        return $this->getParameter('password');
    }

    public function setPassword($value)
    {
        return $this->setParameter('password', $value);
    }

    public function getUsername()
    {
        return $this->getParameter('username');
    }

    public function setUsername($value)
    {
        return $this->setParameter('username', $value);
    }
}