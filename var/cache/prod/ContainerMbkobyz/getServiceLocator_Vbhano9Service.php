<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the private 'service_locator.vbhano9' shared service.

return $this->services['service_locator.vbhano9'] = new \Symfony\Component\DependencyInjection\ServiceLocator(array('enfantMateriel' => function () {
    $f = function (\AppBundle\Entity\EnfantMateriel $v) { return $v; }; return $f(${($_ = isset($this->services['autowired.AppBundle\Entity\EnfantMateriel']) ? $this->services['autowired.AppBundle\Entity\EnfantMateriel'] : ($this->services['autowired.AppBundle\Entity\EnfantMateriel'] = new \AppBundle\Entity\EnfantMateriel())) && false ?: '_'});
}));
