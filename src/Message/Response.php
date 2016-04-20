<?php

namespace Omnipay\Hipay\Message;

use Omnipay\Common\Message\AbstractResponse;

class Response extends AbstractResponse
{
    const HIPAY_CAPTURE_REQUESTED = 117;
    const HIPAY_CAPTURED = 118;
    const HIPAY_REFUND_REQUESTED = 124;
    const HIPAY_REFUNDED = 125;
    const HIPAY_AUTHORIZED = 116;
    const HIPAY_AUTHORIZATION_REQUESTED = 142;
    const HIPAY_AUTHORIZED_AND_PENDING = 112;
    const HIPAY_REFUSED = 113;
    const HIPAY_CARDHOLDER_NOT_ENROLLED = 104;
    const HIPAY_UNABLE_TO_AUTHENTICATE = 105;
    const HIPAY_AUTHENTICATION_ATTEMPTED = 107;
    const HIPAY_COULD_NOT_AUTHENTICATE = 108;
    const HIPAY_AUTHENTICATION_FAILED = 109;
    const HIPAY_BLOCKED = 110;
    const HIPAY_DENIED = 111;
    const HIPAY_CANCEL = 115;
    const HIPAY_EXPIRED = 114;
    const HIPAY_AUTHORIZATION_REFUSED = 163;

    public function __construct($request, $data)
    {
        $this->request = $request;
        $this->data = $data;
    }

    public function isPending()
    {

    }

    public function isSuccessful()
    {
        return isset($this->data['forwardUrl']) ? $this->data['forwardUrl'] : false;
    }

    public function getTransactionReference()
    {
//        return $this->data['transaction_reference'];
    }

    public function getMessage()
    {

    }

}