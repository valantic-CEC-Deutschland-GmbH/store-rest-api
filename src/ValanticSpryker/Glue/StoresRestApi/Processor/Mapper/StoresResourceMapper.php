<?php

declare(strict_types = 1);

namespace ValanticSpryker\Glue\StoresRestApi\Processor\Mapper;

use Generated\Shared\Transfer\StoresRestAttributesTransfer;
use Spryker\Glue\StoresRestApi\Dependency\Client\StoresRestApiToStoreClientInterface;
use Spryker\Glue\StoresRestApi\Processor\Mapper\StoresResourceMapper as SprykerStoresResourceMapper;

class StoresResourceMapper extends SprykerStoresResourceMapper
{
    /**
     * @param \Spryker\Glue\StoresRestApi\Dependency\Client\StoresRestApiToStoreClientInterface $storeClient
     * @param array $storeMappingPlugins
     */
    public function __construct(StoresRestApiToStoreClientInterface $storeClient, private array $storeMappingPlugins)
    {
        parent::__construct($storeClient);
    }

    /**
     * @param array $countries
     * @param array $currencies
     *
     * @return \Generated\Shared\Transfer\StoresRestAttributesTransfer
     */
    public function mapStoreToStoresRestAttribute(array $countries, array $currencies): StoresRestAttributesTransfer
    {
        $storeRestAttributesTransfer = parent::mapStoreToStoresRestAttribute($countries, $currencies);

        return $this->executeStoreMappingPlugins($storeRestAttributesTransfer);
    }

    /**
     * @param \Generated\Shared\Transfer\StoresRestAttributesTransfer $storeRestAttributesTransfer
     *
     * @return \Generated\Shared\Transfer\StoresRestAttributesTransfer
     */
    protected function executeStoreMappingPlugins(StoresRestAttributesTransfer $storeRestAttributesTransfer): StoresRestAttributesTransfer
    {
        foreach ($this->storeMappingPlugins as $storeMappingPlugin) {
            $storeRestAttributesTransfer = $storeMappingPlugin->map($storeRestAttributesTransfer);
        }

        return $storeRestAttributesTransfer;
    }
}
