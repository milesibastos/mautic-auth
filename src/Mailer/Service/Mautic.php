<?php

namespace Mailer\Service;

use Base\Interfaces\Service;
use Mautic\Auth\ApiAuth;

class Mautic implements Service
{
    private $settings;

    public function __construct(array $settings = [])
    {
        $this->settings = $settings;
    }

    public function getAccessTokenData()
    {
        $auth = ApiAuth::initiate($this->settings);

        $accessTokenData = [];

        if ($auth->validateAccessToken()) {
            if ($auth->accessTokenUpdated()) {
                $accessTokenData = $auth->getAccessTokenData();
            }
        }

        return $accessTokenData;
    }
}