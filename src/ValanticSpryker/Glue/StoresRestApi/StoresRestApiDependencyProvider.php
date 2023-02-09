<?php

declare(strict_types = 1);

namespace ValanticSpryker\Glue\StoresRestApi;

use Spryker\Glue\Kernel\Container;
use Spryker\Glue\StoresRestApi\StoresRestApiDependencyProvider as SprykerStoresRestApiDependencyProvider;

class StoresRestApiDependencyProvider extends SprykerStoresRestApiDependencyProvider
{
    public const STORE_RESOURCE_MAPPER_PLUGINS = 'STORE_RESOURCE_MAPPER_PLUGINS';

    /**
     * @param \Spryker\Glue\Kernel\Container $container
     *
     * @return \Spryker\Glue\Kernel\Container
     */
    public function provideDependencies(Container $container): Container
    {
        $container = parent::provideDependencies($container);

        return $this->addStoreResourceMapperPlugins($container);
    }

    /**
     * @param \Spryker\Glue\Kernel\Container $container
     *
     * @return \Spryker\Glue\Kernel\Container
     */
    protected function addStoreResourceMapperPlugins(Container $container): Container
    {
        $container->set(static::STORE_RESOURCE_MAPPER_PLUGINS, function () {
            return $this->getStoreResourceMapperPlugins();
        });

        return $container;
    }

    /**
     * @return array<\ValanticSpryker\Glue\StoresRestApi\Plugin\StoreResourceMapperPluginInterface>
     */
    protected function getStoreResourceMapperPlugins(): array
    {
        return [ ];
    }
}
