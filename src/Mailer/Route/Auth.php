<?php

namespace Mailer\Route;

use Respect\Rest\Routable;
use Base\Service\ServiceLocator;

class Auth implements Routable
{
    public function get()
    {
        $mautic     = ServiceLocator::get('mautic');
        $tokenData  = $mautic->getAccessTokenData();

        return $tokenData;
    }
}