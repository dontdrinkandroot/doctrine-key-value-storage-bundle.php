<?php

namespace Dontdrinkandroot\DoctrineKeyValueStorageBundle\DependencyInjection;

use Override;
use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    #[Override]
    public function getConfigTreeBuilder(): TreeBuilder
    {
        $treeBuilder = new TreeBuilder('ddr_doctrine_key_value_storage');
        $rootNode = $treeBuilder->getRootNode();
        /* @formatter:off */
        /* @formatter:on */

        return $treeBuilder;
    }
}
