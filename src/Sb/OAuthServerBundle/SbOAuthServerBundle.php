<?php
namespace Sb\OAuthServerBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class SbOAuthServerBundle extends Bundle
{
    public function getParent()
    {
        return 'FOSOAuthServerBundle';
    }
}
