<?php

namespace App\Strategy;

use App\Contracts\AuthContract;

class AuthStrategy
{

    public function __construct(public AuthContract $authContract){ }

    public function makeLogin()
    {
        $this->authContract->login();
    }

    public function setContract($contract)
    {
        $this->authContract = $contract;
    }

}
