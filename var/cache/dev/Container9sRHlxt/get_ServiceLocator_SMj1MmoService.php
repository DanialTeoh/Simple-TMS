<?php

namespace Container9sRHlxt;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_ServiceLocator_SMj1MmoService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.service_locator.SMj1Mmo' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.service_locator.SMj1Mmo'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService ??= $container->getService(...), [
            'entityManager' => ['services', 'doctrine.orm.default_entity_manager', 'getDoctrine_Orm_DefaultEntityManagerService', false],
            'task' => ['privates', '.errored..service_locator.SMj1Mmo.App\\Entity\\Task', NULL, 'Cannot autowire service ".service_locator.SMj1Mmo": it needs an instance of "App\\Entity\\Task" but this type has been excluded in "config/services.yaml".'],
        ], [
            'entityManager' => '?',
            'task' => 'App\\Entity\\Task',
        ]);
    }
}
