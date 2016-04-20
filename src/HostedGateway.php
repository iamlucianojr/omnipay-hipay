<?php

namespace Omnipay\Hipay;

use Omnipay\Common\AbstractGateway;

class HostedGateway extends AbstractGateway
{
    public function getName()
    {
        return 'Hipay';
    }

    public function getUsername()
    {
        return $this->getParameter('username');
    }

    public function setUsername($username)
    {
        return $this->setParameter('username', $username);
    }

    public function getPassword()
    {
        return $this->getParameter('password');
    }

    public function setPassword($password)
    {
        return $this->setParameter('password', $password);
    }

    public function getPassphrase()
    {
        return $this->getParameter('passphrase');
    }

    public function setPassphrase($passphrase)
    {
        return $this->setParameter('passphrase', $passphrase);
    }

    public function purchase(array $parameters = array())
    {
        return $this->authorize($parameters);
    }

    public function authorize(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\Hipay\Message\Request', $parameters);
    }
/*
    public function capture(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\Hipay\Message\CaptureRequest', $parameters);
    }

    public function refund(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\Hipay\Message\RefundRequest', $parameters);
    }
*/
}