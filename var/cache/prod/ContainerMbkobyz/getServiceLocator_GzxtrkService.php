<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the private 'service_locator.gzxtrk_' shared service.

return $this->services['service_locator.gzxtrk_'] = new \Symfony\Component\DependencyInjection\ServiceLocator(array('lienfamilliale' => function () {
    $f = function (\AppBundle\Entity\Lienfamilliale $v) { return $v; }; return $f(${($_ = isset($this->services['autowired.AppBundle\Entity\Lienfamilliale']) ? $this->services['autowired.AppBundle\Entity\Lienfamilliale'] : ($this->services['autowired.AppBundle\Entity\Lienfamilliale'] = new \AppBundle\Entity\Lienfamilliale())) && false ?: '_'});
}));
