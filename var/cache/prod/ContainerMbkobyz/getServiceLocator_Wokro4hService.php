<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the private 'service_locator.wokro4h' shared service.

return $this->services['service_locator.wokro4h'] = new \Symfony\Component\DependencyInjection\ServiceLocator(array('mesenger' => function () {
    $f = function (\AppBundle\Service\Mesenger $v = null) { return $v; }; return $f(${($_ = isset($this->services['AppBundle\Service\Mesenger']) ? $this->services['AppBundle\Service\Mesenger'] : $this->load('getMesengerService.php')) && false ?: '_'});
}));