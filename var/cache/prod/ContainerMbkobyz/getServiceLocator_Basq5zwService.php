<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the private 'service_locator.basq5zw' shared service.

return $this->services['service_locator.basq5zw'] = new \Symfony\Component\DependencyInjection\ServiceLocator(array('utilService' => function () {
    $f = function (\AppBundle\Service\UtilService $v = null) { return $v; }; return $f(${($_ = isset($this->services['AppBundle\Service\UtilService']) ? $this->services['AppBundle\Service\UtilService'] : $this->load('getUtilServiceService.php')) && false ?: '_'});
}));