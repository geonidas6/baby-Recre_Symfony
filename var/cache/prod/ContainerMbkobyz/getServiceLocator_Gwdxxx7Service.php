<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the private 'service_locator.gwdxxx7' shared service.

return $this->services['service_locator.gwdxxx7'] = new \Symfony\Component\DependencyInjection\ServiceLocator(array('authenticationUtils' => function () {
    return ${($_ = isset($this->services['security.authentication_utils']) ? $this->services['security.authentication_utils'] : $this->load('getSecurity_AuthenticationUtilsService.php')) && false ?: '_'};
}));
