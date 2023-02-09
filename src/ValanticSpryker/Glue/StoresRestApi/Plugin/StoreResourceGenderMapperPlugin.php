<?php

declare(strict_types = 1);

namespace ValanticSpryker\Glue\StoresRestApi\Plugin;

use Generated\Shared\Transfer\StoresRestAttributesTransfer;
use Spryker\Glue\Kernel\AbstractPlugin;

/**
 * @method \ValanticSpryker\Glue\StoresRestApi\StoresRestApiFactory getFactory()
 */
class StoreResourceGenderMapperPlugin extends AbstractPlugin implements StoreResourceMapperPluginInterface
{
    /**
     * @param \Generated\Shared\Transfer\StoresRestAttributesTransfer $storeRestAttributesTransfer
     *
     * @return \Generated\Shared\Transfer\StoresRestAttributesTransfer
     */
    public function map(StoresRestAttributesTransfer $storeRestAttributesTransfer): StoresRestAttributesTransfer
    {
        $storeClient = $this->getFactory()->getStoreClient();
        $storeRestAttributesTransfer->setGenders($storeClient->getCurrentStore()->getAvailableGenders());

        return $storeRestAttributesTransfer;
    }
}
