<?php

namespace Container9sRHlxt;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_ServiceLocator_9GxEjdService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.service_locator.9Gx_Ejd' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.service_locator.9Gx_Ejd'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService ??= $container->getService(...), [
            'flag' => ['privates', '.errored..service_locator.9Gx_Ejd.App\\Entity\\Flag', NULL, 'Cannot autowire service ".service_locator.9Gx_Ejd": it needs an instance of "App\\Entity\\Flag" but this type has been excluded in "config/services.yaml".'],
        ], [
            'flag' => 'App\\Entity\\Flag',
        ]);
    }
}
