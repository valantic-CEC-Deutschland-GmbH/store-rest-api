<?php

declare(strict_types = 1);

namespace ValanticSpryker\Glue\StoresRestApi;

use ValanticSpryker\Glue\StoresRestApi\Processor\Mapper\StoresResourceMapper;
use Spryker\Glue\StoresRestApi\Processor\Mapper\StoresResourceMapperInterface;
use Spryker\Glue\StoresRestApi\StoresRestApiFactory as SprykerStoresRestApiFactory;

class StoresRestApiFactory extends SprykerStoresRestApiFactory
{
    /**
     * @return \Spryker\Glue\StoresRestApi\Processor\Mapper\StoresResourceMapperInterface
     */
    public function createStoresResourceMapper(): StoresResourceMapperInterface
    {
        return new StoresResourceMapper(
            $this->getStoreClient(),
            $this->getStoreResourceMapperPlugins(),
        );
    }

    /**
     * @return array
     */
    public function getStoreResourceMapperPlugins(): array
    {
        return $this->getProvidedDependency(StoresRestApiDependencyProvider::STORE_RESOURCE_MAPPER_PLUGINS);
    }
}
