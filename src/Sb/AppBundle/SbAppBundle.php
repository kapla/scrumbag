<?php

namespace Sb\AppBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class SbAppBundle extends Bundle
{
    /**
     * Get Parent method
     *
     * @return string
     */
    public function getParent()
    {
        return 'FOSUserBundle';
    }
}
