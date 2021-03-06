<?php

declare(strict_types=1);

/*
 * The MIT License (MIT)
 *
 * Copyright (c) 2014-2017 Spomky-Labs
 *
 * This software may be modified and distributed under the terms
 * of the MIT license.  See the LICENSE file for details.
 */

namespace OAuth2Framework\Bundle\Server\DependencyInjection\Source\Endpoint;

use Fluent\PhpConfigFileLoader;
use OAuth2Framework\Bundle\Server\DependencyInjection\Source\ActionableSource;
use Symfony\Component\Config\Definition\Builder\NodeDefinition;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;

final class ClientConfigurationSource extends ActionableSource
{
    /**
     * {@inheritdoc}
     */
    protected function continueLoading(string $path, ContainerBuilder $container, array $config)
    {
        foreach ($config as $k => $v) {
            $container->setParameter($path.'.'.$k, $v);
        }

        $loader = new PhpConfigFileLoader($container, new FileLocator(__DIR__.'/../../../Resources/config/endpoint'));
        $loader->load('client_configuration.php');
    }

    /**
     * {@inheritdoc}
     */
    protected function name(): string
    {
        return 'client_configuration';
    }

    /**
     * {@inheritdoc}
     */
    protected function continueConfiguration(NodeDefinition $node)
    {
        parent::continueConfiguration($node);
        $node
            ->validate()
                ->ifTrue(function ($config) {
                    return true === $config['enabled'] && empty($config['realm']);
                })
                ->thenInvalid('The option "realm" must be set.')
            ->end()
            ->children()
                ->scalarNode('realm')->end()
                ->booleanNode('authorization_header')->defaultTrue()->end()
                ->booleanNode('query_string')->defaultFalse()->end()
                ->booleanNode('request_body')->defaultFalse()->end()
                ->scalarNode('path')->defaultValue('/client/configure/{client_id}')->end()
            ->end();
    }
}
