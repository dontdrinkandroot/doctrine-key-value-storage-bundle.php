<?php

namespace Dontdrinkandroot\DoctrineKeyValueStorageBundle\Service\Service\Config;

use Dontdrinkandroot\DoctrineKeyValueStorageBundle\Service\DoctrineKeyValueStorage;
use Dontdrinkandroot\DoctrineKeyValueStorageBundle\Service\KeyValueStorageInterface;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;

use function Symfony\Component\DependencyInjection\Loader\Configurator\service;

return function (ContainerConfigurator $configurator): void {
    $services = $configurator->services();

    $services->set(DoctrineKeyValueStorage::class, DoctrineKeyValueStorage::class)
        ->args([
            service('doctrine')
        ]);

    $services->alias(KeyValueStorageInterface::class, DoctrineKeyValueStorage::class);
};
